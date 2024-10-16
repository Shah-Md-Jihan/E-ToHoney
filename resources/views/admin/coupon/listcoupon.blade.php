@extends('layouts.dashboard_master')

@section('coupon')
  active
@endsection

@section('coupon_list')
  active
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
        <span class="breadcrumb-item active">List Coupon</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <span>Coupon List</span>
                            </div>
            
                            <div class="card-body">  
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Sl No</th>
                                        <th scope="col">Coupon Title</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Expired On</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                      @forelse ($coupons as $coupon)
                                      <tr>
                                        <td>
                                            {{ $coupons->firstItem() + $loop->index }}
                                        </td>
                                        <td>
                                          {{ $coupon->coupon_title }}
                                        </td>
                                        <td>
                                          {{ $coupon->discount_amount }}%
                                        </td>
                                        <td>
                                            {{ $coupon->expired_date }}
                                        </td>
                                        <td>
                                            @if ($coupon->expired_date >= \Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge rounded-pill bg-success">Valid</span>
                                            @else
                                            <span class="badge rounded-pill bg-secondary">Invalid</span>
                                            @endif
                                        </td>
                                        <td>
                                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                              <a href="" type="button" class="btn btn-info">Edit</a>
                                              <a href="" type="button" class="btn btn-warning">Delete</a>
                                            </div>
                                        </td>
                                      </tr>
                                      @empty
                                          <tr>
                                            <td>No coupons to show</td>
                                          </tr>
                                      @endforelse

                                    </tbody>
                                  </table>
                                  {{ $coupons->links() }}
                            </div>
                        </div>
                    </div>
                        
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection      