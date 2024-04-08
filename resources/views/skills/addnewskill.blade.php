@extends('layouts/app')

@section('content')

<div class="container-fluid position-relative d-flex p-0">

    <!-- testimonial Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-12">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <form action="{{route('blogs.store')}}" method ="POST" enctype="multipart/form-data">
                        @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Ja~Lo</h3>
                        </a>
                        <h3>Add Blog</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="image_blog" class="form-control" id="floatingText" placeholder="profile_image" accept="image/*" autofocus required>
                        <label for="floatingText">Image</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control" id="floatingInput" placeholder="title" required>
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-4">
                        <textarea name="content" class="form-control" id="floatingPassword" placeholder="work" required></textarea>
                        <label for="floatingPassword">Content</label>
                    </div>
                    <div class="form-floating mb-4" >
                        <input type="text" name="author" class="form-control" id="floatingPassword" placeholder="author" value="{{Auth::user()->name}}" readonly>
                        <label for="floatingPassword">Author</label>
                    </div>
                   
                  
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Create</button>
                    <p class="text-center mb-0">Do you want to go back?<button type="button" class="btn btn-link" onclick="backtoblog()">Back</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonailform End -->
</div>
<style>
    .author{
        visibility: hidden;
    }
</style>
@endsection