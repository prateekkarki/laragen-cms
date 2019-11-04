@if(auth()->user()->can('view_products_title') || auth()->user()->can('edit_products_title') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="title">Title</label>
    <div class="col-sm-12 col-md-7">
        <input class="form-control @if ($errors->has('title')) is-invalid @endif" type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" >
        @if ($errors->has('title'))
            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
        @endif
    </div>
</div>
@endif

@if(auth()->user()->can('view_products_slug') || auth()->user()->can('edit_products_slug') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="slug">Slug</label>
    <div class="col-sm-12 col-md-7">
        <input class="form-control @if ($errors->has('slug')) is-invalid @endif" type="text" name="slug" id="slug" placeholder="Slug" value="{{ old('slug') }}" required="required" >
        @if ($errors->has('slug'))
            <span class="invalid-feedback">{{ $errors->first('slug') }}</span>
        @endif
    </div>
</div>
@endif

@if(auth()->user()->can('view_products_short_description') || auth()->user()->can('edit_products_short_description') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="short_description">Short Description</label>
    <div class="col-sm-12 col-md-7">
        <input class="form-control @if ($errors->has('short_description')) is-invalid @endif" type="text" name="short_description" id="short_description" placeholder="Short Description" value="{{ old('short_description') }}" >
        @if ($errors->has('short_description'))
            <span class="invalid-feedback">{{ $errors->first('short_description') }}</span>
        @endif
    </div>
</div>
@endif

