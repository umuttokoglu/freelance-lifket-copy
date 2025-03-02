<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->withCount('children')
            ->with('user')
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        $isSubCategory = request()->boolean('sub_cat');

        return view('admin.category.create', compact('isSubCategory'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $filePath = $request->file('image')->store('/category', 'public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

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
        $filePath = $request->file('image')->store('/category', 'public');

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $filePath;

        $category->update($data);

        session()->flash('message', __('admin/category.edit.success'));

        return response()->redirectToRoute('admin.category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $image = $category->image;
        $isDeleted = $category->delete();

        if (!$isDeleted) {
            session()->flash('message', __('admin/category.destroy.fail'));

            return response()->redirectToRoute('admin.category.index');
        }

        unlink(storage_path('app/public/' . $image));

        session()->flash('message', __('admin/category.destroy.success'));

        return response()->redirectToRoute('admin.category.index');
    }
}
