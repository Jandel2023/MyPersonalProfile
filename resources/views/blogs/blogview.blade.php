@extends('layouts/app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<link href={{asset("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css")}} rel="stylesheet">

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
                        <div class="col-sm-8"><h2>Blogs</h2></div>
                        <div class="col-sm-4">
                            <a href="{{ route('blogs.index') }}" class="btn btn-outline-danger"><i class="fa fa-plus"></i> Back</a>
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
                      
                            <th>Blog_Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Date</th>
                           
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                         
                            <td><img src="{{ asset('storage/' . $testimonial->image_blog) }}" alt="Blog Image" style="max-width: 120px; max-height: 150px;">
                            <td>{{$testimonial->title}}</td>
                            <td>{{$testimonial->content}}</td>
                            
                            <td>{{$testimonial->author}}</td>
                            <td>{{$testimonial->status}}</td>
                            <td>{{$testimonial->created_at}}</td>
                           
                            
                        </tr>
                       
                    </tbody>
                   
                </table>
              
            </div>
        </div>
    </div>     


@endsection