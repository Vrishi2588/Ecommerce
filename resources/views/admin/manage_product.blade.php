@extends('admin/layout')
@section('page_title','Manage_product')
@section('container')
@section('product_select','active')

@if($id>0)
{{ $image_required="" }}
@else
{{ $image_required="required" }}
@endif
<h1 class="mb10">Manage Product</h1>
<a href="{{ url('admin/product') }}">
    <button type="button" class="btn btn-success">
        Back
    </button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <form action="{{ route('product.manage_product_process') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @csrf
                            <div class="form-group">
                                <label for="name" class="control-label mb-1"> Name</label>
                                <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="control-label mb-1">Slug</label>
                                    <input id="slug" value="{{ $slug }}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                    @error('slug')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="control-label mb-1">Image</label>
                                        <input id="image" " name=" image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{ $image_required }}>
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="category_id" class="control-label mb-1">Category</label>
                                                    <select id="category_id" name="category_id" type=" text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                        <option value="">Select Categories</option>
                                                        @foreach($category as $list)
                                                        @if($category_id== $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                            @else
                                                        <option value="{{ $list->id }}">
                                                            @endif
                                                            {{ $list ->category_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-4">
                                                    <label for="brand" class="control-label mb-1">Brand</label>
                                                    <input id="brand" value="{{ $brand }}" name=" brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="model" class="control-label mb-1">Model</label>
                                                    <input id="model" value="{{ $model }}" name=" model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="short_desc" class="control-label mb-1">Short Desc</label>
                                            <textarea id="short_desc" name=" short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required{{ $short_desc }}></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc" class="control-label mb-1">Desc</label>
                                            <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required{{ $desc }}></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords" class="control-label mb-1">Keywords</label>
                                            <input id="keywords" value="{{ $keywords }}" name=" keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                            <input id="technical_specification" value="{{ $technical_specification }}" name=" technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="uses" class="control-label mb-1">Uses</label>
                                            <input id="uses" value="{{ $uses }}" name=" uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="warranty" class="control-label mb-1">Warranty</label>
                                            <input id="warranty" value="{{ $warranty }}" name=" warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="sku" class="control-label mb-1">SKU</label>
                                            <input id="file" name="sku" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="mrp" class="control-label mb-1">MRP</label>
                                            <input id="mrp" name="mrp" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="price" class="control-label mb-1">Price</label>
                                            <input id="price" name="price" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="color_id" class="control-label mb-1">Color</label>
                                            <select id="color_id" name="color_id" class="form-control" aria-required="true" aria-invalid="false" required>
                                                <option value="">Select Size</option>
                                                @foreach($colors as $list)
                                                <option value="{{ $list->id }}">
                                                    {{ $list ->color}}</option>
                                                @endforeach
                                            </select>

                                            </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                    <input type="hidden" name="id" value="{{ $id }}">
                </div>
        </form>
    </div>
</div>
@endsection
