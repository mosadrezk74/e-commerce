@extends('dashboard.layouts.layout')

@section('title')
    Products
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <a href="{{ url('/dashboard/products/create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i lass="fas fa-download fa-sm text-white-50"></i>
                New Product
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Products List
                </h6>
            </div>

            <div class="card-body">

                @include('dashboard.layouts.messages')

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($products as $product)
                                <tr>
                                    <td>
{{--                                        <img src="{{ $product->path }}" alt="{{ $product->name }}">--}}
                                        <img   src="{{ $product->photo }}">

                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('dashboard/products/' . $product->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <a href="{{ url('dashboard/products/' . $product->id . '/delete') }}"
                                            class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%">
                                        <div class="alert alert-warning">
                                            No data found
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer">
                {{ $products->links() }}
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
