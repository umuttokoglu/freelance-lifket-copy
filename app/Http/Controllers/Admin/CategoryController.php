<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->withCount('children')
            ->with('user')
            ->whereNull('parent_id')
            ->latest('categories.sort_order')
            ->simplePaginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $filePath = $request->file('image')->store('/category', 'root_public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

        $maxOrder = Category::whereNull('parent_id')
            ->max('sort_order') ?: 0;

        $data['sort_order'] = $maxOrder + 1;

        Category::query()->create($data);

        session()->flash('message', __('admin/category.create.success'));

        return response()->redirectToRoute('admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('/category', 'root_public');
            $data['image'] = $filePath;
        }

        $data['user_id'] = auth()->user()->id;

        $category->update($data);

        session()->flash('message', __('admin/category.edit.success'));

        return response()->redirectToRoute('admin.category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {

        // Silinecek kategori resmi
        $imagePath = $category->image;

        // Transaction içinde hem silme hem de yeniden sıralama yapalım
        $deleted = DB::transaction(function() use ($category, $imagePath) {
            // 1) Kategoriyi sil
            $isDeleted = $category->delete();
            if (! $isDeleted) {
                // rollback için false dönebiliriz
                return false;
            }

            // 2) Fiziksel dosyayı da sil
            if (file_exists(public_path($imagePath))) {
                @unlink(public_path($imagePath));
            }

            // 3) Kalan ana kategorileri çek ve sort_order’u baştan ata
            Category::whereNull('parent_id')
                ->orderBy('sort_order')
                ->get()
                ->each(function(Category $cat, $idx) {
                    $cat->update(['sort_order' => $idx + 1]);
                });

            return true;
        });

        if (! $deleted) {
            session()->flash('message', __('admin/category.destroy.fail'));
            return redirect()->route('admin.category.index');
        }

        session()->flash('message', __('admin/category.destroy.success'));
        return redirect()->route('admin.category.index');

        /*$image = $category->image;
        $isDeleted = $category->delete();

        if (!$isDeleted) {
            session()->flash('message', __('admin/category.destroy.fail'));

            return response()->redirectToRoute('admin.category.index');
        }

        unlink(public_path($image));

        session()->flash('message', __('admin/category.destroy.success'));

        return response()->redirectToRoute('admin.category.index');*/
    }

    public function reorder(Request $request)
    {
        $id       = $request->input('id');
        $newOrder = (int) $request->input('order');

        // Yalnızca parent_id NULL (ana kategori) için güncelle
        $target = Category::where('id', $id)
            ->whereNull('parent_id')
            ->firstOrFail();

        // Mevcut sıralamayı al
        $oldOrder = $target->sort_order;

        // Aynı grup: tüm ana kategoriler
        $siblings = Category::whereNull('parent_id')
            ->where('id', '!=', $id)
            ->orderBy('sort_order')
            ->pluck('id')
            ->toArray();

        // $id’yi yeni pozisyona yerleştir
        array_splice($siblings, max(0, $newOrder - 1), 0, [$id]);

        // Baştan yeniden 1’den başlatıp güncelle
        foreach ($siblings as $index => $catId) {
            Category::where('id', $catId)
                ->update(['sort_order' => $index + 1]);
        }

        return response()->json(['status' => 'ok']);
    }
}
