@extends('backend.layouts.main')

@push('page-styles')
    <link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap-timepicker.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}" >
@endpush

@section('page-header')
    <div class="title-box col-md-7">
        <div class="section-header-back">
            <a href="{{ route('backend.product_real_fields.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>
            ProductRealField Management
        </h1>
    </div>
    <div class="button-box col-md-5">
        <button class="btn btn-primary" type="button" onclick="document.getElementById('product_real_field-form').submit();">
            <i class="fa fa-save"></i> Create product_real_field
        </button>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Create product_real_fields</h4>
    </div>
    <div class="card-body">
	    @if ($errors->any())
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
		@endif    

        <form action="{{ route('backend.product_real_fields.store') }}" enctype="multipart/form-data" method="POST" id="product_real_field-form">
            @csrf
            <div class="row mt-4 mb-4">
                <div class="col">
                    <ul class="nav nav-tabs nav-top-border no-hover-bg">
                        <li class="nav-item">
                            <a class="nav-link active" id="base-tab0" data-toggle="tab" aria-controls="tab0" href="#tab0" aria-expanded="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Relations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="true">Images</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="true">Seo</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane active" id="tab0" aria-expanded="true" aria-labelledby="base-tab0">
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    @include('backend.product_real_fields.create.form_parts.general')
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane " id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    @include('backend.product_real_fields.create.form_parts.relations')
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane " id="tab2" aria-expanded="true" aria-labelledby="base-tab2">
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    @include('backend.product_real_fields.create.form_parts.images')
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane " id="tab3" aria-expanded="true" aria-labelledby="base-tab3">
                            <div class="row mt-4 mb-4">
                                <div class="col">
                                    @include('backend.product_real_fields.create.form_parts.seo')
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-save"></i> Create product_real_field
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('page-scripts')
    <script src="{{ asset('js/summernote-bs4.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
@endpush
