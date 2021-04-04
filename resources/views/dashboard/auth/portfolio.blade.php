@php
    $models = ['users','categories','products'];
    $operatios = ['read','create','update','delete'];
@endphp
@extends('dashboard.layouts.app')
@section('content')
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img" src="{{asset('uploads/admins/').'/'.auth()->guard('web')->user()->image}}">
                        <h4>{{auth()->guard('web')->user()->name}}</h4>
                        <p style="font-size: large">
                            @php
                                $name = explode("_", implode(', ', auth()->guard('web')->user()->roles->pluck('name')->toArray()));
                                $lastname = ucfirst(array_pop($name));
                                $firstname = ucfirst(implode("_", $name));
                                echo $firstname.' '.$lastname;
                            @endphp
                        </p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">@lang("dashboardLang.Settings")</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-timeline">
                        <div class="timeline-post">
                            <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                                <div class="content">
                                    <h5><a href="#">John Doe</a></h5>
                                    <p class="text-muted"><small>2 January at 9:30</small></p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <ul class="post-utility">
                                <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                                <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                                <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                            </ul>
                        </div>
                        <div class="timeline-post">
                            <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                                <div class="content">
                                    <h5><a href="#">John Doe</a></h5>
                                    <p class="text-muted"><small>2 January at 9:30</small></p>
                                </div>
                            </div>
                            <div class="post-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <ul class="post-utility">
                                <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                                <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                                <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user-settings">
                        <div class="tile user-settings">
                            <h4 class="line-head">@lang("dashboardLang.Settings")</h4>
                            <form method="post" action="{{route('user.post.portfolio')}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-5">
                                        <label>@lang("dashboardLang.First_Name")</label>
                                        <input class="form-control" type="text" name="first_name" value="{{$first ?? ''}}">
                                    </div>
                                    <div class="col-md-5">
                                        <label>@lang("dashboardLang.Last_Name")</label>
                                        <input class="form-control" type="text" name="last_name" value="{{$last}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mb-4">
                                        <label>@lang("dashboardLang.Email")</label>
                                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>@lang("dashboardLang.Photo")</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>@lang("dashboardLang.Password")</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>@lang("dashboardLang.Confirm_Password")</label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="row mb-10 mt-5">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
<!-----


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
                <input type="checkbox" disabled name="permission[]" {{$user->hasPermission($model.'_'.$ope)? 'checked' : '' }}  value="{{$model}}_{{$ope}}"><span class="label-text">@lang("dashboardLang.$ope")</span>
                                                            </label>
                                                        </div>
                                                    @endforeach
        </div>
@endforeach
    </div>
</div>



---------->
