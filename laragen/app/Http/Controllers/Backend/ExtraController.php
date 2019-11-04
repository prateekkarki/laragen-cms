<?php

namespace Laragen\App\Http\Controllers\Backend;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ExtraRequest;
use App\Http\Controllers\Backend\UploadController;
use Illuminate\Http\Request;
use App\Models\Extra;

/**
 * ExtraController
 *
 * Handles extras on admin area
 *
 */

class ExtraController extends Controller
{
    public function __construct(UploadController $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Show the application extras index.
     */
    public function index(Request $request): View
    {
        $sortDirection = $request->input('sort_dir') ?: 'asc';
        $sortColumn = $request->input('sort') ?: 'created_at';
        return view('backend.extras.index', [
            'extras' => Extra::orderBy($sortColumn, $sortDirection)->paginate(20)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Extra $extra): View
    {
        return view('backend.extras.edit', [
            'extra' => $extra,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('backend.extras.create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExtraRequest $request): RedirectResponse
    {
            $extra = Extra::create($request->all());

            
            return redirect()->route('backend.extras.edit', $extra)->withSuccess(__('extras.created'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExtraRequest $request, Extra $extra): RedirectResponse
    {
        $errors = [];

        $updateData = $request->validated();




        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors);
        }else{
            $extra->update($updateData);
            return redirect()->route('backend.extras.edit', $extra)->withSuccess(__('extras.created'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extra  $extra)
    {
        if(auth()->user()->can('delete_extras')){
            $extra->delete();
            return redirect()->route('backend.extras.index')->withSuccess(__('extras.deleted'));
        }else{
            return redirect()->back()->withErrors(["You are not allowed to delete extras."]);
        }
    }
}
