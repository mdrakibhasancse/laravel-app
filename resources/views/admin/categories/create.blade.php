@extends('admin.layouts.app')
@section('title','Create')
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
          <h3 class="card-title mt-2">Category List</h3>
        </div>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
             <div class="card-body">
                  <div class="form-group">
                    <label for="name">Category name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Enter Category Name">
                     @error('name')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                 </div>
                  <div class="form-group">
                    <label for="category">Main Category</label>
                     <select name="main_category_id" id="category" class="form-control  @error('main_category_id') is-invalid @enderror">
                         <option value="">---selected category---</option>
                         @foreach ($main_categories as $value => $description)
                               <option value="{{ $value }}"{{ old('main_category_id')==strval($value) ? 'selected' : ' ' }}>{{ $description }}</option>
                         @endforeach
                     </select>
                     @error('main_category_id')
                     <span style="color: red">{{ $message }}</span>
                    @enderror
                  </div>

                </div>
                <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>

@endsection

@push('scripts')

<script>
//    $(document).ready(function () {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//      $("#submit").click(function(){
//         $.ajax({
//             url: "{{ route('categories.store') }}",
//             data: $('#formId').serialize(),
//             type:'post',
//             success: function(result){
//                alert('success');
//            }
//         });
//     });
</script>

@endpush
