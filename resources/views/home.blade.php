@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
</div>
@endsection
