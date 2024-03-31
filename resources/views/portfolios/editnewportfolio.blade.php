@extends('layouts.app')

@section('content')

<div class="container-fluid position-relative d-flex p-0">

    <!-- testimonial Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-12">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <form action="{{ route('updateportfolio',$portfolio->id) }}" method="post" enctype="multipart/form-data">
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
                        <h3>Edit Portfolio</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" value="" name="portfolio_img" class="form-control" id="floatingText" placeholder="portfolio image" accept="image/*" autofocus>
                        <label for="floatingText">Image</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="portfolio_type" value="{{$portfolio->portfolio_type}}"  class="form-control" id="floatingInput" placeholder="portfolio type" required>
                        <label for="floatingInput">Type</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="portfolio_title" value="{{$portfolio->portfolio_title}}" class="form-control" id="floatingPassword" placeholder="portfolio title" required>
                        <label for="floatingPassword">Title</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="portfolio_url" value="{{$portfolio->portfolio_url}}" name="author" class="form-control" id="floatingPassword" placeholder="portfolio url" required>
                        <label for="floatingPassword">URL</label>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Edit</button>
                    <p class="text-center mb-0">Do you want to go back?<button type="button" class="btn btn-link" onclick="backtoportfolio()">Back</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</div>

    <!-- testimonailform End -->
@endsection 
