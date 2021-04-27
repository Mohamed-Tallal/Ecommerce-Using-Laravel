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
                    <input class="form-control w-75" id="exampleInputPassword1" type="text" placeholder="Search">
                    <button class="btn btn-info ml-3" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        @lang('dashboardLang.Search')
                    </button>
            </form>
        </div>
        <div class="col col-lg-4" style="margin-left: -80px">

        @if(auth()->user()->hasPermission('users_create'))
                <a type="button" href="{{route('product.create')}}" class="btn btn-info">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    @lang('dashboardLang.Add_New_Admin')
                </a>

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
        @if($products->count() >0)
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
                                            <th style="width: 109px;">@lang('dashboardLang.Email')</th>
                                            <th style="width: 54px;">@lang('dashboardLang.Permission')</th>
                                            <th style="width: 108px;"> @lang('dashboardLang.Control') </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $index=>$product)
                                            <tr role="row" class="odd">
                                                <td>{{++$index}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->email}}</td>
                                                <td style="text-align: center">
                                                    <span class="badge badge-success">
                                                        {{
                                                    $firstname = ucfirst(implode("_", explode("_", implode(', ',
                                                    $product->roles->pluck('name')->toArray()))))

                                                    }}
                                                    </span>
                                                </td>
                                                <td class="d-flex">
                                                    @if(auth()->user()->hasPermission('users_update'))

                                                        <a class="btn btn-primary mr-2 d-flex" href="{{route('admin.edit',$product->id)}}" style="color: #fff" type="button">
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
                                                        <form method="post" action="{{route('admin.destroy',$product->id)}}">
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
                                        @lang('dashboardLang.Showing_1_to'){{$products->count()}} @lang('dashboardLang.of')  {{$productCount}} @lang('dashboardLang.entries') </div>
                                </div>
                                <div class="col-sm-12 col-md-7" >
                                    {{$products->links('paginate')}}
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

@stop

