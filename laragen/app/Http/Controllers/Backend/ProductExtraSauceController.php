<?php

namespace Laragen\App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductExtraSauceRequest;
use App\Http\Controllers\Backend\UploadController;
use Illuminate\Http\Request;
use App\Models\ProductExtraSauce;

/**
 * ProductExtraSauceController
 *
 * Handles product_extra_sauces on admin area
 *
 */

class ProductExtraSauceController extends Controller
{
    public function __construct(UploadController $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Show the application product_extra_sauces index.
     */
    public function index(Request $request): View
    {
        $sortDirection = $request->input('sort_dir') ?: 'asc';
        $sortColumn = $request->input('sort') ?: 'created_at';
        return view('backend.product_extra_sauces.index', [
            'product_extra_sauces' => ProductExtraSauce::orderBy($sortColumn, $sortDirection)->paginate(20)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(ProductExtraSauce $product_extra_sauce): View
    {
        return view('backend.product_extra_sauces.edit', [
            'product_extra_sauce' => $product_extra_sauce,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.product_extra_sauces.create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductExtraSauceRequest $request): RedirectResponse
    {
            $product_extra_sauce = ProductExtraSauce::create($request->all());

            
            return redirect()->route('backend.product_extra_sauces.edit', $product_extra_sauce)->withSuccess(__('product_extra_sauces.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductExtraSauceRequest $request, ProductExtraSauce $product_extra_sauce): RedirectResponse
    {
        $errors = [];

        $updateData = $request->validated();




        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }else{
            $product_extra_sauce->update($updateData);
            return redirect()->route('backend.product_extra_sauces.edit', $product_extra_sauce)->withSuccess(__('product_extra_sauces.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductExtraSauce  $product_extra_sauce)
    {
        if(auth()->user()->can('delete_product_extra_sauces')){
            $product_extra_sauce->delete();
            return redirect()->route('backend.product_extra_sauces.index')->withSuccess(__('product_extra_sauces.deleted'));
        }else{
            return redirect()->back()->withErrors(["You are not allowed to delete product_extra_sauces."]);
        }
    }
}
