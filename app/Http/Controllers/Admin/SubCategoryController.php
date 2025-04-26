<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\StoreSubCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Http\Requests\Admin\UpdateSubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    public function index(): View
    {
        $subCategories = Category::query()
            ->withCount('products')
            ->with(['user', 'parent'])
            ->whereNotNull('parent_id')
            ->latest('categories.sort_order')
            ->simplePaginate(10);

        return view('admin.sub_category.index', compact('subCategories'));
    }

    public function create(): View|RedirectResponse
    {
        $categories = Category::query()
            ->withCount('children')
            ->with('user')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        if ($categories->isEmpty()) {
            session()->flash('error', 'İlk önce ana kategori eklemelisiniz. Lütfen ana kategori ekledikten sonra tekrar deneyiniz.');

            return response()->redirectToRoute('admin.sub-category.index');
        }

        return view('admin.sub_category.create', compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        $filePath = $request->file('image')->store('/category', 'root_public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

        $max = Category::whereNotNull('parent_id')
            ->max('sort_order') ?: 0;
        $data['sort_order'] = $max + 1;

        Category::query()->create($data);

        session()->flash('message', 'Alt Ürün Kategorisi Başarıyla Eklendi.');

        return response()->redirectToRoute('admin.sub-category.index');
    }

    public function edit(Category $subCategory)
    {
        $categories = Category::query()
            ->withCount('children')
            ->with('user')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        if ($categories->isEmpty()) {
            session()->flash('error', 'İlk önce ana kategori eklemelisiniz. Lütfen ana kategori ekledikten sonra tekrar deneyiniz.');

            return response()->redirectToRoute('admin.sub-category.index');
        }

        return view('admin.sub_category.edit', compact('categories', 'subCategory'));
    }

    public function update(UpdateSubCategoryRequest $request, Category $subCategory)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('/category', 'root_public');
            $data['image'] = $filePath;
        }

        $data['user_id'] = auth()->user()->id;

        $subCategory->update($data);

        session()->flash('message', 'Alt Kategori Başarıyla Güncellendi.');

        return response()->redirectToRoute('admin.sub-category.index');
    }

    public function destroy(Category $subCategory): RedirectResponse
    {
        $image = $subCategory->image;

        DB::transaction(function() use($subCategory, $image) {
            $subCategory->delete();

            if(file_exists(public_path($image))) {
                unlink(public_path($image));
            }

            Category::whereNotNull('parent_id')
                ->orderBy('sort_order')
                ->get()
                ->each(function($cat, $idx){
                    $cat->update(['sort_order'=> $idx+1]);
                });
        });

        session()->flash('message', 'Alt ürün kategorisi başarıyla silindi!');

        return response()->redirectToRoute('admin.sub-category.index');
    }

    public function reorder(Request $request)
    {
        $id       = $request->input('id');
        $newOrder = (int)$request->input('order');

        DB::transaction(function() use($id, $newOrder) {
            // 1) Aynı parent_id’li alt kategorileri al (id hariç)
            $siblings = Category::whereNotNull('parent_id')
                ->where('id', '!=', $id)
                ->orderBy('sort_order')
                ->pluck('id')
                ->toArray();

            // 2) $id’yi yeni pozisyona ekle
            array_splice($siblings, max(0, $newOrder - 1), 0, [$id]);

            // 3) Baştan 1’den başlayarak güncelle
            foreach($siblings as $index => $catId) {
                Category::where('id', $catId)
                    ->update(['sort_order' => $index + 1]);
            }
        });

        return response()->json(['status'=>'ok']);
    }
}
