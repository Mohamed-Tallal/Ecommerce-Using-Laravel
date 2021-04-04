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
                @lang('dashboardLang.Admin_Page')
            </h1>
            <p>@lang('dashboardLang.Admins_of_ecoWaza_Website')</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">
                <a href="{{route('dashboard.index')}}">
                    @lang('dashboardLang.Dashboard')
                </a>
            </li>
            <li class="breadcrumb-item active">@lang('dashboardLang.Admins')</li>
        </ul>
    </div>
    <div class="row d-flex mb-4" >
        <div class="col col-lg-8">
            <form class="d-flex">
                    <input class="form-control w-75" id="exampleInputPassword1" type="password" placeholder="Search">
                    <button class="btn btn-info ml-3" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        @lang('dashboardLang.Search')
                    </button>
            </form>
        </div>
        <div class="col col-lg-4" style="margin-left: -80px">

        @if(auth()->user()->hasPermission('users_create'))
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    @lang('dashboardLang.Add_New_Admin')
                </button>
        @else
            <button type="button" disabled class="btn btn-info">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                @lang('dashboardLang.Add_New_Admin')
            </button>
        @endif
        </div>
    </div>
    <div class="tile mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <p class="mb-3 line-head" style="font-size: 20px" id="navs">All Admins </p>
                </div>
            </div>
        </div>
        @if($coupons->count() >0)
        <div class="row">
            <div class="col-md-12">
                <div class="tile-body">
                    <div class="table-responsive">
                        <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover table-striped no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                        <thead>
                                        <tr role="row">
                                            <th style="width: 150px;">#</th>
                                            <th style="width: 253px;">@lang('dashboardLang.Name')</th>
                                            <th style="width: 109px;">@lang('dashboardLang.percentage')</th>
                                            <th style="width: 108px;"> @lang('dashboardLang.Control') </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coupons as $index=>$coupon)
                                            <tr role="row" class="odd">
                                                <td>{{++$index}}</td>
                                                <td>{{$coupon->name}}</td>
                                                <td>{{$coupon->percentage}}</td>
                                                <td class="d-flex">
                                                    @if(auth()->user()->hasPermission('users_update'))
                                                        <a class="btn btn-primary mr-2 d-flex" href="{{route('admin.edit',$coupon->id)}}" style="color: #fff" type="button">
                                                            <i class="fa fa-pencil iStyle" aria-hidden="true"></i>
                                                            @lang('dashboardLang.Update')
                                                        </a>
                                                    @else
                                                        <button disabled class="btn btn-primary mr-2 d-flex" style="color: #fff" type="button">
                                                            <i class="fa fa-pencil iStyle" aria-hidden="true"></i>
                                                            @lang('dashboardLang.Update')
                                                        </button>
                                                    @endif
                                                    @if(auth()->user()->hasPermission('users_delete'))
                                                        <form method="post" action="{{route('admin.destroy',$coupon->id)}}">
                                                        @csrf
                                                            {{method_field('delete')}}
                                                            <button class="btn btn-danger d-flex" type="submit">
                                                            <i class="fa fa-user-times iStyle" aria-hidden="true"></i>
                                                                @lang('dashboardLang.Delete')
                                                        </button>
                                                        </form>
                                                    @else
                                                        <button disabled class="btn btn-danger d-flex" type="button">
                                                            <i class="fa fa-user-times iStyle" aria-hidden="true"></i>
                                                            @lang('dashboardLang.Delete')
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-5" >
                                    <div style="margin-top: -6px" class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">
                                        @lang('dashboardLang.Showing_1_to'){{$coupons->count()}} @lang('dashboardLang.of') {{$couponsCount->count()}} @lang('dashboardLang.entries') </div>
                                </div>
                                <div class="col-sm-12 col-md-7" >
                                    {{$coupons->links('paginate')}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <h4 style="text-align: center;">@lang('dashboardLang.Not_Yield_Record_Yet') </h4>
        @endif
    </div>
@if(auth()->user()->hasPermission('users_create'))
    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
         data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('dashboardLang.Add_New_Admin')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.store')}}">
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>@lang('dashboardLang.First_Name')</label>
                                    <input class="form-control" type="text" name="first_name" >
                                </div>
                                <div class="col-md-6">
                                    <label>@lang('dashboardLang.Last_Name')</label>
                                    <input class="form-control" type="text" name="last_name" >
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label>@lang('dashboardLang.Email')</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 mb-4">
                                <label>@lang('dashboardLang.Photo') Photo</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 mb-4">
                                <label>@lang('dashboardLang.Password')</label>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 mb-4">
                                <label>@lang('dashboardLang.Confirm_Password')</label>
                                <input class="form-control" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>@lang('dashboardLang.Permissions')</label>

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
                                                    <input type="checkbox" name="permission[]" value="{{$model}}_{{$ope}}"><span class="label-text">@lang("dashboardLang.$ope")</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("dashboardLang.Close")</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang("dashboardLang.Save")</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endif

@stop
