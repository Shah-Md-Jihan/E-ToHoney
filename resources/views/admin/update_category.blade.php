@extends('layouts.dashboard_master')

@section('category')
  active
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Add Category</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
                   
          <div class="col-md-12">
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
                        <div class="mb-3">
                          <label class="form-label">Current Category Photo</label>
                          <img style="width: 120px;display:block;" src="{{ asset('uploads/categories') }}/{{ $current_category_photo_name }}" alt="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Add New Category Photo</label>
                          <input type="file" name="new_category_photo" class="form-control">
                          @error('new_category_photo')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-warning">Update</button>
                      </form>
                </div>
            </div>
        </div>
                        
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection  

