@extends('backend.layouts.main')

@section('title', ' | ' . __('labels.backend.access.products.management'))

@section('page-header')
    <h1>Product Management</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All products </h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($products->count())
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
                                    <th>
                    <a href="{{ route('backend.products.index') }}?sort=title&sort_dir={{ request()->input('sort_dir')=='asc' ? 'desc' : 'asc' }}">Title
                        @if(request()->input('sort')=='title')
                            {!! request()->input('sort_dir')=='asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>' !!}
                        @endif
                    </a>
                </th>
                                    <th> 
                                        <a href="{{ route('backend.products.index') }}?sort=updated_at&sort_dir={{ request()->input('sort_dir')=='asc' ? 'desc' : 'asc' }}">Last Updated 
                                            @if(request()->input('sort')=='updated_at')
                                                {!! request()->input('sort_dir')=='asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>' !!}
                                            @endif
                                        </a>
                                    </th>
                                    <th> 
                                        <a href="{{ route('backend.products.index') }}?sort=status&sort_dir={{ request()->input('sort_dir')=='asc' ? 'desc' : 'asc' }}">Status 
                                            @if(request()->input('sort')=='status')
                                                {!! request()->input('sort_dir')=='asc' ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>' !!}
                                            @endif
                                        </a>
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $index = $products->perPage()*($products->currentPage() - 1) + 1; @endphp
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" class="custom-control-input child-checkbox" id="checkbox-{{ $product->id }}">
                                            <label for="checkbox-{{ $product->id }}" class="custom-control-label">{{ $key + $index }}</label>
                                        </div>
                                    </td>
                                    
                                    <td> {{ $product->title }}</td>


                                    <td>{{ $product->updated_at }}</td>

                                    <td>
                                        @if($product->status)
                                            <div class="badge badge-success" title="Enabled"><i class="fas fa-eye"></i></div>
                                        @else
                                            <div class="badge badge-danger" title="Disabled"><i class="fas fa-eye-slash"></i></div>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <a href="#sdfg" target="_blank" class="btn btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('backend.products.edit', $product) }}" class="btn btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('backend.products.destroy', $product) }}" method="post" id="delete-form-{{ $product->id }}" class="btn-group">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="button"
                                                data-confirm="Delete product|Are you sure?"
                                                data-confirm-yes="$('#delete-form-{{ $product->id }}').submit();">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {!! request()->get('sort') ? $products->appends(['sort' => request()->get('sort')])->links() : $products->links() !!}
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
    </div>
</div>
@endsection
