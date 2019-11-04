@if(auth()->user()->can('view_product_real_fields_filename') || auth()->user()->can('edit_product_real_fields_filename') )
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="dropfilename">Filename</label>
    <div class="col-sm-12 col-md-7" id="filenameContainer">
        <div class="dropzone dropzone-file-area" id="dropfilename">
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
    dropzoneupload('{{ route('backend.uploader') }}', 'filename', '{!! $product_real_field->id ?? "''" !!}','product_real_field', ".png,.jpg,.gif,.bmp,.jpeg", false)
</script>
@endpush

@endif

