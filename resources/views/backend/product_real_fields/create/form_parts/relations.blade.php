@if(auth()->user()->can('view_product_real_fields_product_id') || auth()->user()->can('edit_product_real_fields_product_id') )
<div class="form-group row mb-4">
  	<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="product_id">Product</label>
  	<div class="col-sm-12 col-md-7">
		<select class="form-control select2 @if ($errors->has('product_id')) is-invalid @endif" id="product_id" name="product_id">
			<option value="">Please select</option>
			@foreach($products as $p_product)
				<option value="{{ $p_product->id }}"  {{ 
						$p_product->id == old('product_id') ? ' checked' : ''
				}}>{{ $p_product->title }}</option>
			@endforeach
		</select>
		@if ($errors->has('product_id'))
			<span class="invalid-feedback">{{ $errors->first('product_id') }}</span>
		@endif
  	</div>
</div>
@endif

