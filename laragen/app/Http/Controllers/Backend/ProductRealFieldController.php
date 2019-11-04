<?php

namespace Laragen\App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRealFieldRequest;
use App\Http\Controllers\Backend\UploadController;
use Illuminate\Http\Request;
use App\Models\ProductRealField;
use App\Models\Product;

/**
 * ProductRealFieldController
 *
 * Handles product_real_fields on admin area
 *
 */

class ProductRealFieldController extends Controller
{
    public function __construct(UploadController $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Show the application product_real_fields index.
     */
    public function index(Request $request): View
    {
        $sortDirection = $request->input('sort_dir') ?: 'asc';
        $sortColumn = $request->input('sort') ?: 'created_at';
        return view('backend.product_real_fields.index', [
            'product_real_fields' => ProductRealField::orderBy($sortColumn, $sortDirection)->paginate(20)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(ProductRealField $product_real_field): View
    {
        return view('backend.product_real_fields.edit', [
            'product_real_field' => $product_real_field,
            'products' => Product::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.product_real_fields.create', [
            'products' => Product::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRealFieldRequest $request): RedirectResponse
    {
            $product_real_field = ProductRealField::create($request->all());
        if ($request->has("filename")) {
            $uploadData = $this->uploader->processImage($request->input("filename"), "product_real_field");
            if (empty($uploadData["errors"])) {
                $updateData["filename"] = $uploadData["filename"];
            }
        }

            
            return redirect()->route('backend.product_real_fields.edit', $product_real_field)->withSuccess(__('product_real_fields.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRealFieldRequest $request, ProductRealField $product_real_field): RedirectResponse
    {
        $errors = [];

        $updateData = $request->validated();
        if ($request->has("filename")) {
            $uploadData = $this->uploader->processImage($request->input("filename"), "product_real_field");
            if (empty($uploadData["errors"])) {
                $updateData["filename"] = $uploadData["filename"];
            }
        }




        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }else{
            $product_real_field->update($updateData);
            return redirect()->route('backend.product_real_fields.edit', $product_real_field)->withSuccess(__('product_real_fields.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductRealField  $product_real_field)
    {
        if(auth()->user()->can('delete_product_real_fields')){
            $product_real_field->delete();
            return redirect()->route('backend.product_real_fields.index')->withSuccess(__('product_real_fields.deleted'));
        }else{
            return redirect()->back()->withErrors(["You are not allowed to delete product_real_fields."]);
        }
    }
}
