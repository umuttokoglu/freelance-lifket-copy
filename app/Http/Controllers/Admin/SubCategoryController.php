<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\StoreSubCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    public function index(): View
    {
        $subCategories = Category::query()
            ->withCount('products')
            ->with(['user', 'parent'])
            ->whereNotNull('parent_id')
            ->latest()
            ->paginate(10);

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

        Category::query()->create($data);

        session()->flash('message', 'Alt Ürün Kategorisi Başarıyla Eklendi.');

        return response()->redirectToRoute('admin.sub-category.index');
    }

    /*public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $filePath = $request->file('image')->store('/category', 'public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

        $category->update($data);

        session()->flash('message', __('admin/category.edit.success'));

        return response()->redirectToRoute('admin.category.index');
    }*/

    public function destroy(Category $subCategory): RedirectResponse
    {
        $image = $subCategory->image;
        $isDeleted = $subCategory->delete();

        if (!$isDeleted) {
            session()->flash('error', 'Alt ürün kategorisi ile ilişkili ürünler olduğu için kayıt silinemedi. İlk önce ürünleri silmelisiniz.');

            return response()->redirectToRoute('admin.sub-category.index');
        }

        unlink(public_path($image));

        session()->flash('message', 'Alt ürün kategorisi başarıyla silindi!');

        return response()->redirectToRoute('admin.sub-category.index');
    }
}
