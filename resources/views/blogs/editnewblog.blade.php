@extends('layouts.app')

@section('content')

<div class="container-fluid position-relative d-flex p-0">

    <!-- testimonial Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-12">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <form action="{{ route('updatetestimonial',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Ja~Lo</h3>
                        </a>
                        <h3>Edit testimonail</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" value="" name="profile_img" class="form-control" id="floatingText" placeholder="profile_image" accept="image/*" autofocus>
                        <label for="floatingText">Profile</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="content"  class="form-control" id="floatingInput" placeholder="" required>{{$testimonial->content}}</textarea>
                        <label for="floatingInput">Content</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="job_title" value="{{$testimonial->job_title}}" class="form-control" id="floatingPassword" placeholder="work" required>
                        <label for="floatingPassword">Work</label>
                    </div>
                    <div class="author">
                        <input type="text" value="{{$testimonial->author}}" name="author" class="form-control" id="floatingPassword" placeholder="author" readonly>
                        <label for="floatingPassword">Author</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Edit</button>
                    <p class="text-center mb-0">Do you want to go back?<button type="button" class="btn btn-link" onclick="backtotestimonial()">Back</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</div>

    <!-- testimonailform End -->
@endsection 
