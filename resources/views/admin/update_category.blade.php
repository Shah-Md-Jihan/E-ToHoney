@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('addcategory') }}">Add Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $category_name }}</li>
                </ol>
              </nav>
            <div class="card">
                <div class="card-header bg-success text-white">
                    <span>Update Category</span>
                </div>
                
                <div class="card-body">
                    
                    <form action="{{ url('update/category/post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Add Category Name</label>
                          <input type="hidden" name="category_id" class="form-control" value="{{ $category_id }}">
                          <input type="text" name="category_name" class="form-control" value="{{ $category_name }}">
                          @error('category_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
