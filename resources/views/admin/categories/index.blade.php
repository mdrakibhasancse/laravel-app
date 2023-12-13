@extends('admin.layouts.app')
@section('title','Index')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Category</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
       <!-- Default box -->
       <div class="card">
        <div class="card-header">
          <h3 class="card-title mt-2">Category</h3>

          <div class="card-tools">
            <a class="btn btn-success float-end" href="{{route('categories.create')}}">Add New Category</a>
          </div>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Category Name</th>
                    <th>Main Category</th>
                    <th>Action</th>
                </tr>

                @foreach($categories as $category)
                      <tr>
                          <td>{{ $category->name }}</td>
                          <td>{{ App\Enums\MainCategory::getDescription($category->main_category_id) }}</td>
                          <td>
                              <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning">Edit</a>
                              <form action="{{route('categories.destroy',$category->id)}}" method="post" style="display:inline"
                                onSubmit="return confirm('Are you sure you want to delete?')">
                                 @csrf
                                 @method('delete')
                                 <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">

        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

@endsection
