@if(auth()->user()->can('view_products_image') || auth()->user()->can('edit_products_image') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="dropimage">Image</label>
    <div class="col-sm-12 col-md-7" id="imageContainer">
        <div class="dropzone dropzone-file-area" id="dropimage">
            <div class="dz-default dz-message">
                <h3 class="sbold">Drop image here to upload</h3>
                <span>You can also click to open file browser</span>
            </div>
        </div>
        <div class="validation-errors">
        </div>
    </div>
</div>

@push('after-scripts')
<script type="text/javascript">
    dropzoneupload('{{ route('backend.uploader') }}', 'image', '{!! $product->id ?? "''" !!}','product', ".png,.jpg,.gif,.bmp,.jpeg", false, '{!! json_encode([['filename' => $product->image, 'size'=>null ]]) !!}');
</script>
@endpush

@endif

@if(auth()->user()->can('view_products_real_field') || auth()->user()->can('edit_products_real_field') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="dropreal_field">Real Field</label>
    <div class="col-sm-12 col-md-7" id="real_fieldContainer">
        <div class="dropzone dropzone-file-area" id="dropreal_field">
            <div class="dz-default dz-message">
                <h3 class="sbold">Drop image here to upload</h3>
                <span>You can also click to open file browser</span>
            </div>
        </div>
        <div class="validation-errors">
        </div>
    </div>
</div>

@push('after-scripts')
<script type="text/javascript">
    dropzoneupload('{{ route('backend.gallery.uploader') }}', 'real_field', '','product', '.png,.jpg,.gif,.bmp,.jpeg', true, '{!! json_encode($product->real_field->toArray()) !!}')
</script>
@endpush

@endif

