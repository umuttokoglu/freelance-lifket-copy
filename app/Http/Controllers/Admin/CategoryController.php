<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
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
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $fileUrl = url($request->file('image')->store('category', 'public'));

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $fileUrl;

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
        $fileUrl = url($request->file('image')->store('category', 'public'));

        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $fileUrl;

        $category->update($data);

        session()->flash('message', __('admin/category.edit.success'));

        return response()->redirectToRoute('admin.category.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        session()->flash('message', __('admin/category.destroy'));

        return response()->redirectToRoute('admin.category.index');
    }
}
