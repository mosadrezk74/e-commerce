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
            <a href="{{ url('/dashboard/categories/create') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i lass="fas fa-download fa-sm text-white-50"></i>
                New Category
            </a>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Categories List
                </h6>
            </div>
            <div class="card-body">

                @include('dashboard.layouts.messages')

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($cats as $category)
                                <tr>
                                    <td>
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        <form action="{{ url('dashboard/categories/' . $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ url('dashboard/categories/' . $category->id . '/edit') }}"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
@endsection
