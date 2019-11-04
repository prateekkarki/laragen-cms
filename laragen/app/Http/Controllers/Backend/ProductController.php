<?php

namespace Laragen\App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Controllers\Backend\UploadController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Extra;
use App\Models\ProductRealField;
use App\Models\Category;
use App\Models\ProductExtraSauce;

/**
 * ProductController
 *
 * Handles products on admin area
 *
 */

class ProductController extends Controller
{
    public function __construct(UploadController $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Show the application products index.
     */
    public function index(Request $request): View
    {
        $sortDirection = $request->input('sort_dir') ?: 'asc';
        $sortColumn = $request->input('sort') ?: 'created_at';
        return view('backend.products.index', [
            'products' => Product::orderBy($sortColumn, $sortDirection)->paginate(20)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Product $product): View
    {
        return view('backend.products.edit', [
            'product' => $product,
            'extras' => Extra::all(),
            'categories' => Category::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.products.create', [
            'extras' => Extra::all(),
            'categories' => Category::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request): RedirectResponse
    {
            $product = Product::create($request->all());
        if ($request->has("image")) {
            $uploadData = $this->uploader->processImage($request->input("image"), "product");
            if (empty($uploadData["errors"])) {
                $updateData["image"] = $uploadData["filename"];
            }
        }
        if ($request->has("real_field")) {
            $real_field=[];
            foreach($request->input("real_field") as $input){
                $uploadData = $this->uploader->processImage($input, "product");
                $real_field[] = new ProductRealField($uploadData);
            }
            $product->real_field()->saveMany($real_field);
        }

            if ($request->has("teams")) {
            $product->teams()->attach($request->input("teams"));
        }

            return redirect()->route('backend.products.edit', $product)->withSuccess(__('products.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $errors = [];

        $updateData = $request->validated();
        if ($request->has("image")) {
            $uploadData = $this->uploader->processImage($request->input("image"), "product");
            if (empty($uploadData["errors"])) {
                $updateData["image"] = $uploadData["filename"];
            }
        }
        if ($request->has("real_field")) {
            $real_field=[];
            foreach($request->input("real_field") as $input){
                $uploadData = $this->uploader->processImage($input, "product");
                $real_field[] = new ProductRealField($uploadData);
            }
            $product->real_field()->saveMany($real_field);
        }


        if ($request->has("teams")) {
            $product->teams()->sync($request->input("teams"));
        }


        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }else{
            $product->update($updateData);
            return redirect()->route('backend.products.edit', $product)->withSuccess(__('products.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product  $product)
    {
        if(auth()->user()->can('delete_products')){
            $product->delete();
            return redirect()->route('backend.products.index')->withSuccess(__('products.deleted'));
        }else{
            return redirect()->back()->withErrors(["You are not allowed to delete products."]);
        }
    }
}
