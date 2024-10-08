@extends('layouts.dashboard_master')

@section('products')
  active
@endsection
@section('add_product')
  active
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Add Product</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">

                    <div class="col-md-8 mx-auto">
                        @if (session('product_add_message'))
            
                                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </symbol>
                                        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </symbol>
                                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                        </symbol>
                                    </svg>
                                  
                                    <div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>
                                      {{ session('product_add_message') }}
                                    </div>
                                  </div>
            
                                @endif
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <span>Add Category</span>
                            </div>
            
                            <div class="card-body">
                                <form action={{ url('add/products/post') }} method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label class="form-label">Product Title</label>
                                      <input type="text" name="title" class="form-control">
                                      
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Descriptions</label>
                                      <textarea name="descriptions" cols="30" rows="4" class="form-control"></textarea>
                                      
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Quantity</label>
                                      <input type="number" name="quantity" class="form-control">
                                      
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Price</label>
                                      <input type="number" name="price" class="form-control">
                                      
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Category</label>
                                      <select name="category_id" class="form-select form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                      </select>
                                      
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Thumbnail Photo</label>
                                      <input type="file" name="thumbnail_photo" class="form-control">  
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Multiple Photo</label>
                                      <input type="file" name="multiple_photo[]" class="form-control" multiple>  
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">Submit</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                        
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection      