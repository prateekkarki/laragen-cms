@if(auth()->user()->can('view_extras_title') || auth()->user()->can('edit_extras_title') )
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

