@extends('layouts.dashboard_master')

@section('products')
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
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <span>Products List</span>
                            </div>
            
                            <div class="card-body">  
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Product Photo</th>
                                        <th scope="col">Products Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      @foreach ($products as $product)
                                      <tr>
                                        <td>
                                          <img width="100px" src="{{ asset('uploads/products') }}/{{ $product->thumbnail_photo }}" alt="">
                                        </td>
                                        <td>
                                          {{Str::limit($product->title, 50)}}
                                        </td>
                                        <td>
                                          <span class="badge rounded-pill bg-success">Active</span>
                                        </td>
                                        <td>
                                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                              <a href="" type="button" class="btn btn-info">Edit</a>
                                              <a href="" type="button" class="btn btn-warning">Delete</a>
                                            </div>
                                        </td>
                                      </tr>
                                      @endforeach

                                    </tbody>
                                  </table>
                                  {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                        
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection      