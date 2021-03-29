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
                Categories Page
            </h1>
            <p>Main Categories of ecoWaza Website</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Admins</li>
        </ul>
    </div>
    <div class="row d-flex mb-4" >
        <div class="col col-lg-8">
            <form class="d-flex">
                    <input class="form-control w-75" id="exampleInputPassword1" type="password" placeholder="Search">
                    <button class="btn btn-info ml-3" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Search
                    </button>
            </form>
        </div>
        <div class="col col-lg-4" style="margin-left: -80px">

        @if(auth()->user()->hasPermission('users_create'))
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    Add New Category
                </button>
        @else
            <button type="button" disabled class="btn btn-info">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                Add New Category
            </button>
        @endif
        </div>
    </div>
    <div class="tile mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <p class="mb-3 line-head" style="font-size: 20px" id="navs">All Users </p>
                </div>
            </div>
        </div>
        @if($users->count() >0)
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
                                            <th style="width: 253px;">Name</th>
                                            <th style="width: 109px;">Email</th>
                                            <th style="width: 108px;">Control</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $index=>$user)
                                            <tr role="row" class="odd">
                                                <td>{{++$index}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td class="d-flex">
                                                    @if(auth()->user()->hasPermission('users_update'))

                                                        <a class="btn btn-primary mr-2 d-flex" href="{{route('admin.edit',$user->id)}}" style="color: #fff" type="button">
                                                            <i class="fa fa-pencil iStyle" aria-hidden="true"></i>Update
                                                        </a>
                                                    @else
                                                        <button disabled class="btn btn-primary mr-2 d-flex" style="color: #fff" type="button">
                                                            <i class="fa fa-pencil iStyle" aria-hidden="true"></i>Update</button>
                                                    @endif
                                                    @if(auth()->user()->hasPermission('users_delete'))
                                                        <form method="post" action="{{route('admin.destroy',$user->id)}}">
                                                        @csrf
                                                            {{method_field('delete')}}
                                                            <button class="btn btn-danger d-flex" type="submit">
                                                            <i class="fa fa-user-times iStyle" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                        </form>
                                                    @else
                                                        <button disabled class="btn btn-danger d-flex" type="button">
                                                            <i class="fa fa-user-times iStyle" aria-hidden="true"></i>
                                                            Delete
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Showing 1 to {{$users->count()}} of {{$userCount}}  entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7" >
                                    {{$users->links('paginate')}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p> Not Yield Record Yet</p>
        @endif

    </div>
@if(auth()->user()->hasPermission('users_create'))
    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
         data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.store')}}">
                        @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label>English Name</label>
                                    <input class="form-control" type="text" name="name_en" >
                                </div>
                                <div class="col-md-12">
                                    <label>Germany Name</label>
                                    <input class="form-control" type="text" name="name_ge" >
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endif

@stop
