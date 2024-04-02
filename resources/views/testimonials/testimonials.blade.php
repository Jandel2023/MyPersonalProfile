@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<style>
    .table-wrapper {
        width: 100%;
        margin: 30px auto;
        /* background: #262626; */
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        color: green;
        padding-bottom: 10px;
        /* margin: 0 0 10px; */
    }
    .table-title h2 {
        /* margin: 6px 0 0; */
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }
    .table-title .add-new i {
        margin-right: 4px;
    }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
    table.table .form-control.error {
        border-color: #f50000;
    }
    table.table td .add {
        display: none;
    }
    </style>
    
    </head>
    <body>
        <div class="container-fluid pt-4 px-4">
        <div class="table-responsive">
            <div class="table-wrapper bg-secondary">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Testimonials</h2></div>
                        <div class="col-sm-4">
                            <button type="button" onclick="addnewtestimonial()" class="btn btn-outline-success add-new"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 25px;">#</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Work</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonial as $testimonials)
                        @if(Auth::user()->role_name == 'Admin')
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img src="{{ asset('storage/' . $testimonials->profile_img) }}" alt="Profile Image" style="max-width: 150px; max-height: 150px;">
                            </td>
                            <td>{{$testimonials->content}}</td>
                            <td>{{$testimonials->author}}</td>
                            <td>{{$testimonials->job_title}}</td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a href="{{route('edittestimonial',$testimonials->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Delete" data-toggle="modal" data-target="#deleteModal{{$testimonials->id}}"><i class="material-icons">&#xE872;</i></a>
                            </td>



                <!-- delete Modal-->
               <div class="modal fade" id="deleteModal{{$testimonials->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #191C24; color: green;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Testimonial?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete id {{$testimonials->id}}?</div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-success" type="button" data-dismiss="modal">Cancel</button>
                            
                            <form action="{{ route('destroytestimonial',$testimonials->id) }} " method="POST" >
                                @csrf
                                @method('DELETE')
                      
                                <button class="btn btn-outline-success" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div> {{-- end of deleteModal --}}
                        </tr>
                        
                        @elseif($testimonials->author == Auth::user()->name)
                        <tr>
                            <td>{{++$i}}</td>
                            <td><img src="{{ asset('storage/' . $testimonials->profile_img) }}" alt="Profile Image" style="max-width: 150px; max-height: 150px;">
                            </td>
                            <td>{{$testimonials->content}}</td>
                            <td>{{$testimonials->author}}</td>
                            <td>{{$testimonials->job_title}}</td>
                            <td>
                                <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                <a href="{{route('edittestimonial',$testimonials->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a class="delete" title="Delete" data-toggle="modal" data-target="#deleteModal{{$testimonials->id}}"><i class="material-icons">&#xE872;</i></a>
                            </td>



                <!-- delete Modal-->
               <div class="modal fade" id="deleteModal{{$testimonials->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="background-color: #191C24; color: green;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Testimonial?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Are you sure you want to delete id {{$testimonials->id}}?</div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-success" type="button" data-dismiss="modal">Cancel</button>
                            
                            <form action="{{ route('destroytestimonial',$testimonials->id) }} " method="POST" >
                                @csrf
                                @method('DELETE')
                      
                                <button class="btn btn-outline-success" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div> {{-- end of deleteModal --}}



                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                   
                </table>
                {!! $testimonial->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>     


@endsection