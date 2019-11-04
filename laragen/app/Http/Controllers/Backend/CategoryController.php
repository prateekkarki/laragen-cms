<?php

namespace Laragen\App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Backend\UploadController;
use Illuminate\Http\Request;
use App\Models\Category;

/**
 * CategoryController
 *
 * Handles categories on admin area
 *
 */

class CategoryController extends Controller
{
    public function __construct(UploadController $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Show the application categories index.
     */
    public function index(Request $request): View
    {
        $sortDirection = $request->input('sort_dir') ?: 'asc';
        $sortColumn = $request->input('sort') ?: 'created_at';
        return view('backend.categories.index', [
            'categories' => Category::orderBy($sortColumn, $sortDirection)->paginate(20)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Category $category): View
    {
        return view('backend.categories.edit', [
            'category' => $category,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.categories.create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
            $category = Category::create($request->all());

            
            return redirect()->route('backend.categories.edit', $category)->withSuccess(__('categories.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $errors = [];

        $updateData = $request->validated();




        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }else{
            $category->update($updateData);
            return redirect()->route('backend.categories.edit', $category)->withSuccess(__('categories.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category  $category)
    {
        if(auth()->user()->can('delete_categories')){
            $category->delete();
            return redirect()->route('backend.categories.index')->withSuccess(__('categories.deleted'));
        }else{
            return redirect()->back()->withErrors(["You are not allowed to delete categories."]);
        }
    }
}
