<div class="row mb-4">
	<div class="col-md-12 form-group">           
		<div class="actions">
	        <button class="create-btn btn btn-primary" id="modal-button-extra_sauces" type="button"> Create a new extra sauce</button>
	    </div>
	    @php
			$product_extra_sauces = $product->extra_sauces()->paginate(20);
	        $index = $product_extra_sauces->perPage()*($product_extra_sauces->currentPage() - 1) + 1;
	    @endphp`
		
		@if ($product_extra_sauces->count())
			{!! $product_extra_sauces->links() !!}
			<div class="table-responsive">
				<table class="table table-striped" id="table-2">
					<thead>
						<tr>
							<th>
								<div class="custom-checkbox custom-control">
									<input type="checkbox" class="custom-control-input parent-checkbox" id="checkbox-all">
									<label for="checkbox-all" class="custom-control-label">S.No.</label>
								</div>
							</th>
							<th>Title</th>
							<th> Last Updated </th>
							<th> Status </th>
							<th>
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
					
					@foreach($product_extra_sauces as $key => $productextrasauce)
						<tr>
							<td>
								<div class="custom-checkbox custom-control">
									<input type="checkbox" class="custom-control-input child-checkbox" id="checkbox-{{ $productextrasauce->id }}">
									<label for="checkbox-{{ $productextrasauce->id }}" class="custom-control-label">{{ $key + $index }}</label>
								</div>
							</td>
							
							<td> {{ $productextrasauce->title }}</td>


							<td>{{ $productextrasauce->updated_at }}</td>

							<td>
								@if($productextrasauce->status)
									<div class="badge badge-success" title="Enabled"><i class="fas fa-eye"></i></div>
								@else
									<div class="badge badge-danger" title="Disabled"><i class="fas fa-eye-slash"></i></div>
								@endif
								
							</td>
							<td>
								<a href="#" class="btn btn-primary">
									<i class="fa fa-edit" aria-hidden="true"></i>
								</a>

								<button class="btn btn-danger" type="button" 
									data-confirm="Delete extra sauce|Are you sure?"
									data-confirm-yes="deleteMultiple('productextrasauce', '{{ $productextrasauce->id }}', 'extra_sauces'); $('.modal.show').modal('toggle');">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</button>

							</td>
						</tr>

					@endforeach
					</tbody>
				</table>
				{!! request()->get('sort') ? $product_extra_sauces->appends(['sort' => request()->get('sort')])->links() : $product_extra_sauces->links() !!}
			</div>
		@else
			<div class="alert alert-light alert-has-icon">
				<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
				<div class="alert-body">
				<div class="alert-title">Empty</div>
				  	No data found.
				</div>
			  </div>
		@endif
	</div>
</div>

@push('after-scripts')
<script type="text/javascript">
    $('#modal-button-extra_sauces').on('click', function () {
		// $('#modal-extra_sauces').modal();
	});
</script>
@endpush

