@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <span>Profile</span>
                </div>
        
                <div class="card-body">
                    <form action={{ route('postcategory') }} method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">User Name</label>
                          <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                          @error('name')
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