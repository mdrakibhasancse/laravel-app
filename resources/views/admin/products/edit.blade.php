@extends('admin.layouts.app')
@section('title','Edit')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Product</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
       <!-- Default box -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title mt-2">Product Edit</h3>
        </div>

        <form action="{{route('products.update',$product->id)}}" method="POST">
            @csrf
            @method('put')
             <div class="card-body">
                  <div class="form-group">
                    <label for="name">Product name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$product->name}}" placeholder="Enter Product Name">
                     @error('name')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="form-group">
                    <label for="category">Product Category</label>
                     <select name="category_id" id="category" class="form-control  @error('category_id') is-invalid @enderror">
                         <option value="">---selected category---</option>
                         @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ $product->category_id==$category->id ? 'selected' : ' '}}>{{ $category->name }}</option>
                         @endforeach
                     </select>
                     @error('category_id')
                     <span style="color: red">{{ $message }}</span>
                    @enderror
                  </div>


                  <div class="form-group">
                    <label for="name">Product price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{$product->price}}" placeholder="Enter Product Price">
                     @error('price')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label for="discount_amount">Product Discount</label>
                    <input type="number" class="form-control @error('discount_amount') is-invalid @enderror" id="discount_amount" name="discount_amount" value="{{$product->discount_amount}}" placeholder="Enter Product Discount">
                    @error('discount_amount')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="name">Product Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{$product->stock}}" placeholder="Enter Product Stock">
                    @error('stock')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                  <div class="form-group">
                    <label for="description">Product Description</label>
                     <textarea name="description" class="form-control">{{ $product->description}}</textarea>
                  </div>

                  {{-- <div class="form-group">
                    <label for="">Featured Image</label>
                    <input type="file" name="featured_image">
                    @error('featured_image')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label for="">Product Images</label>
                    <input type="file" name="images[]" multiple>
                  </div> --}}

                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

@endsection
