@extends('dashboard.layouts.layout')

@section('title')
    Categories
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Edit Category Form
                </h6>
            </div>
            <div class="card-body">

                @include('dashboard.layouts.messages')

                <form action="{{ url('dashboard/categories/' . $category->id . '/update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $category->name }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
