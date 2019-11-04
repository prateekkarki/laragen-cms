@if(auth()->user()->can('view_products_teams') || auth()->user()->can('edit_products_teams') )
<div class="form-group row mb-4">
  	<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="teams[]">Teams</label>
  	<div class="col-sm-12 col-md-7">
		<select @if(!auth()->user()->can('edit_products_teams')) disabled @endif multiple class="form-control select2 @if ($errors->has('teams')) is-invalid @endif" id="teams" name="teams[]">
			@foreach($extras as $p_extra)
				<option value="{{ $p_extra->id }}" {{
					old('teams') ? ((collect(old('teams'))->contains($p_extra->id)) ? 'selected' : '') : (in_array($p_extra->id, $product->teams->pluck('id')->toArray())) ? 'selected' : ''
				}}>{{ $p_extra->title }}</option>
			@endforeach
		</select>
		@if ($errors->has('teams'))
			<span class="invalid-feedback">{{ $errors->first('teams') }}</span>
		@endif
  	</div>
</div>
@endif

@if(auth()->user()->can('view_products_category_id') || auth()->user()->can('edit_products_category_id') )
<div class="form-group row mb-4">
  	<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="category_id">Category</label>
  	<div class="col-sm-12 col-md-7">
		<select @if(!auth()->user()->can('edit_products_category_id')) disabled @endif class="form-control select2 @if ($errors->has('category_id')) is-invalid @endif" id="category" name="category_id">
			<option value="">Please select</option>
			@foreach($categories as $p_category)
				<option value="{{ $p_category->id }}" {{ 
					old('category_id') ? (old('category_id') == $p_category->id ? 'selected' : '') : (isset($product->category)&&$p_category->id == $product->category->id) ? 'selected' : ''
				}}>{{ $p_category->title }}</option>
			@endforeach
		</select>
		@if ($errors->has('category_id'))
			<span class="invalid-feedback">{{ $errors->first('category_id') }}</span>
		@endif
  	</div>
</div>
@endif

