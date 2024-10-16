@extends('layouts.dashboard_master')

@section('coupon')
  active
@endsection
@section('add_coupon')
  active
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">Add Coupon</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">

                    <div class="col-md-6 mx-auto">
                        
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <span>Add Coupon</span>
                            </div>
            
                            <div class="card-body">
                                <form action={{ url('add/coupon/post') }} method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                      <label class="form-label">Coupon Title</label>
                                      <input type="text" name="coupon_title" value="{{ old('coupon_title') }}" class="form-control">
                                      @error('coupon_title')
                                          <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                    </div>

                                    <div class="mb-3">
                                      <label class="form-label">Discount Amount (%)</label>
                                      <input type="text" name="discount_amount" value="{{ old('discount_amount') }}" class="form-control">
                                      @error('discount_amount')
                                          <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                    </div>

                                    <div class="mb-3">
                                      <label class="form-label">Expired Date</label>
                                      <input type="date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="expired_date" value="{{ old('expired_date') }}" class="form-control">
                                      @error('expired_date')
                                          <p class="text-danger">{{ $message }}</p>
                                      @enderror
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success">Add Coupon</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                        
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection      