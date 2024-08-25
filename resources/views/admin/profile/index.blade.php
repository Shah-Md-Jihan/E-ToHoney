@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if (session('profile_update_message'))

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
                          {{ session('profile_update_message') }}
                    </div>
                </div>

            @endif
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                    <span>Profile</span>
                </div>
        
                <div class="card-body">
                    <form action={{ url('profile/post') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">User Name</label>
                          <input type="text" name="name" value="{{ Str::title(Auth::user()->name) }}" class="form-control">
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success">Update</button>
                      </form>
                </div>
            </div>

        </div>
        <div class="col-md-8">
            @if (session('Password_update_message'))

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
                          {{ session('Password_update_message') }}
                    </div>
                </div>

            @endif
            <div class="card mt-4">
                <div class="card-header bg-success text-white">
                    <span>Update Password</span>
                </div>
        
                <div class="card-body">
                    <form action={{ url('password/post') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Current Password</label>
                          <input type="password" name="current_password" class="form-control" value="{{ old('current_password') }}">
                          @error('current_password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                          @if (session('old_password_error'))
                            <span class="text-danger">{{ session('old_password_error') }}</span>
                          @endif
                        </div>

                        <div class="mb-3">
                          <label class="form-label">New Password</label>
                          <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                          @error('password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control">
                          @error('password')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success">Update</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection