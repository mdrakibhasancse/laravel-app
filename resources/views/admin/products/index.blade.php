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
          <h3 class="card-title mt-2">Product</h3>

          <div class="card-tools">
            <a class="btn btn-success float-end" href="{{route('products.create')}}">Add New Product</a>
          </div>

        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Featured Image</th>
                    <th>Product Discount</th>
                    <th>Product Stock</th>
                    <th>Product Description</th>
                    <th>Action</th>
                </tr>

                @foreach($products as $product)
                      <tr>
                          <td>{{ $product->name }}</td>
                          <td>{{ $product->category->name }}</td>
                          <td>{{ $product->price }}</td>
                          <td> <img width="50" src="{{ asset("/storage/$product->featured_image")}}" alt="" height="50"></td>
                          <td>{{ $product->discount_amount }}</td>
                          <td>{{ $product->stock }}</td>
                          <td>{{ $product->description }}</td>
                          <td>
                              <div class="btn-style d-flex btn-sm">
                                 <div class="edit-btn mr-1">
                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning">Edit</a>
                                 </div>
                                 <div class="delete-btn">
                                    <form action="{{route('products.destroy',$product->id)}}" method="post"
                                        onSubmit="return confirm('Are you sure you want to delete?')">
                                         @csrf
                                         @method('delete')
                                         <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>
                                 </div>
                              </div>
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
