@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card bg-secondary" >
                <div class="card-header bg-secondary" >
                    <h4 class="card-title"> Edit Profile</h4>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @elseif(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('updateprofile',$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image:</label>
                            <input id="profile_image" type="file" class="form-control" name="profile_image" value="" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">User Name:</label>
                            <input type="text" name="name" class="form-control" id="name"  value="{{Auth::user()->name}}" placeholder="username" required>

                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" id="address"  value="{{Auth::user()->address}}" placeholder="address" required>

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address:</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{Auth::user()->email}}" placeholder="email"  required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="tel" name="contact" class="form-control" id="contact" value="{{Auth::user()->phone}}" placeholder="contact"  required>
                        </div>
                        <div class="mb-3">
                            <label for="website" class="form-label">Website:</label>
                            <input type="url" name="website" class="form-control" id="contact" value="{{Auth::user()->website}}" placeholder="contact"  required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection