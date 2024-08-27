@extends('layouts.dashboard_master')

@section('dashboard')
  active
@endsection

@section('content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        {{-- <a class="breadcrumb-item" href="index.html">Starlight</a> --}}
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

        <div class="row row-sm">
            <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <span>Total Users ({{ $total_users }})</span>
                            </div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                <h2>Welcome {{ Auth::user()->name }}</h2>
            
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Created At</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $users as $user )    
                                        <tr>
                                          <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                                          <td>{{ $user->name }}</td>
                                          <td>{{ $user->email }}</td>
                                          <td>{{ $user->created_at->format('d M Y h:i:s A') }}<br>{{ $user->created_at->diffForHumans()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                  {{ $users->links() }}
                            </div>
                        </div>
                    </div>
        </div><!-- row -->

      </div><!-- sl-pagebody -->

@endsection      