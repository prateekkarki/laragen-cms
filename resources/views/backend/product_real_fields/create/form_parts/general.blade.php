@if(auth()->user()->can('view_product_real_fields_size') || auth()->user()->can('edit_product_real_fields_size') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="size">Size</label>
    <div class="col-sm-12 col-md-7">
        <input class="form-control @if ($errors->has('size')) is-invalid @endif" type="number" name="size" id="size" placeholder="Size" value="{{ old('size') }}" >
        @if ($errors->has('size'))
            <span class="invalid-feedback">{{ $errors->first('size') }}</span>
        @endif
    </div>
</div>
@endif

