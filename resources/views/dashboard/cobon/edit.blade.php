@extends('dashboard.layouts.app')
@section('style')
    <style>
        .iStyle{
            padding-top: 3px;
        }
    </style>

@stop
@section('content')

    @php
        $models = ['users','categories','products'];
        $operatios = ['read','create','update','delete'];



    @endphp

    <div class="app-title">
        <div>
            <h1>
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                @lang("dashboardLang.Admin_Page")
            </h1>
            <p>
                @lang("dashboardLang.Edit_Admins_of_ecoWaza_Website")
            </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang("dashboardLang.Dashboard")</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">@lang("dashboardLang.Admins")</a></li>
            <li class="breadcrumb-item active">@lang("dashboardLang.Edit")</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs">@lang("dashboardLang.Edit_Users")</p>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-info ml-auto btn-sm" id="navs" href="{{route('admin.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    @lang("dashboardLang.Show_Admins")
                </a>
            </div>
            </div>

        <form method="post" class="mt-3" action="{{route('admin.update',$admin->id)}}">
            @csrf
            {{method_field('PATCH')}}
            <div class="row">
                <div class="col-md-6">
                    <label>@lang("dashboardLang.First_Name")</label>
                    <input class="form-control" type="text" name="first_name" value="{{$firstname}}">
                </div>
                <div class="col-md-6">
                    <label>@lang("dashboardLang.Last_Name")</label>
                    <input class="form-control" type="text" name="last_name" value="{{$lastname}}" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label>@lang("dashboardLang.Email")</label>
                    <input class="form-control" type="email" name="email" value="{{$admin->email}}">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mb-4">
                    <label>@lang("dashboardLang.Photo") </label>
                    <input class="form-control" type="file" name="image">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mb-4">
                    <label>@lang("dashboardLang.Password") </label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 mb-4">
                    <label>@lang("dashboardLang.Confirm_Password") </label>
                    <input class="form-control" type="password" name="password_confirmation">
                </div>
            </div>
            <div class="col-lg-12">
                <label>@lang("dashboardLang.Permissions") </label>
                <div class="bs-component">
                    <ul class="nav nav-tabs">
                        @foreach($models as $index=>$model)
                            <li class="nav-item"><a class="nav-link {{$index == 0? 'active' : ''}}" data-toggle="tab" href="{{'#'.$model.'_'.$index}}">@lang("dashboardLang.$model")</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-3 ml-2" id="myTabContent">
                        @foreach($models as $index=>$model)
                            <div class="tab-pane fade {{$index == 0? 'active show' : ''}} " id="{{$model.'_'.$index}}">
                                @foreach($operatios as $index=>$ope)
                                    <div class="animated-checkbox">
                                        <label>
                                            <input type="checkbox" name="permission[]" {{$admin->hasPermission($model.'_'.$ope)? 'checked' : '' }}  value="{{$model}}_{{$ope}}"><span class="label-text">@lang("dashboardLang.$ope")</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang("dashboardLang.Save")</button>
            </div>
        </form>

    </div>



@stop
