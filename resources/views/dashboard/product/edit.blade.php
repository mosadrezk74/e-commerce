@extends('dashboard.layouts.layout')

@section('title')
    Categories
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Product Form
                </h6>
            </div>
            <div class="card-body">

                @include('dashboard.layouts.messages')

                <form action="{{ route('products.update' , $product->id) }}" method="POST">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Categories</label>
                        <select class="form-control" name="category_id">
                            <option selected>Choose Category</option>

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $product->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" id="exampleInputEmail1"
                               value="{{ $product->price }}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputEmail1"
                               value="{{ $product->description }}">
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
