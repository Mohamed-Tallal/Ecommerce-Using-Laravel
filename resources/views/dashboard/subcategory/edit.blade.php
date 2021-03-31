@extends('dashboard.layouts.app')
@section('style')
    <style>
        .iStyle{
            padding-top: 3px;
        }
    </style>
@stop
@section('content')

    <div class="app-title">
        <div>
            <h1>
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                category Page
            </h1>
            <p>Edit categories of ecoWaza Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs">Edit Categories </p>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-info ml-auto btn-sm" id="navs" href="{{route('category.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Show Categories</a>
            </div>
            </div>
        <form method="post" class="mt-3" action="{{route('category.update',$category->id)}}">
            @csrf
            {{method_field('PATCH')}}
            <div class="row">
                <div class="col-md-12">
                    <label>English Name</label>
                    <input class="form-control" type="text" name="name_en" value="{{$category->name_en}}">
                </div>
                <div class="col-md-12">
                    <label>Germany Name</label>
                    <input class="form-control" type="text" name="name_de" value="{{$category->name_de}}" >
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </form>

    </div>



@stop
