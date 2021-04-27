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
                @lang("dashboardLang.Admin_Page")
            </h1>
            <p>
                @lang("dashboardLang.Edit_Admins_of_ecoWaza_Website")
            </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang("dashboardLang.Dashboard")</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">@lang("dashboardLang.Products")</a></li>
            <li class="breadcrumb-item active">@lang("dashboardLang.Create")</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs">@lang("dashboardLang.create_product")</p>
                </div>
            </div>

            <div class="col-lg-2">
                <a class="btn btn-info ml-auto btn-sm" id="navs" href="{{route('product.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    @lang("dashboardLang.Show_products")
                </a>
            </div>

            </div>

        <form class="mt-3" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <label>Tags</label>
                        <select class="form-control" id="demoSelect1" name="tags[]" multiple="">
                            <optgroup label="Select Tags">
                              @foreach($tags as $tag)
                                    <option value="{{$tag->name}}">{{$tag->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>

                    </div>
                    <div class="tile-body">
                        <label>Color </label>
                        <select class="form-control" id="demoSelect" name="colors[]" multiple="">
                            <optgroup label="Select Color">
                                @foreach($colors as $color)
                                    <option value="{{$color->name}}">{{$color->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>@lang("dashboardLang.Save")</button>
            </div>
        </form>

    </div>



@stop
@section('script')
    <script type="text/javascript" src="{{asset('dashboard/js/plugins/select2.min.js')}}"></script>
    <script>
        $('#demoSelect').select2();
        $('#demoSelect1').select2();
    </script>

    @stop



