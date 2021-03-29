@extends('dashboard.layouts.app')
@section('content')
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
                    <div class="info"><img class="user-img" src="{{asset('uploads/admins/').'/'.auth()->guard('web')->user()->image}}">
                        <h4>{{auth()->guard('web')->user()->name}}</h4>
                        <p>FrontEnd Developer</p>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
                        <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
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
                            <h4 class="line-head">Settings</h4>
                            <form method="post" action="{{route('user.post.portfolio')}}">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-5">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" name="first_name" value="{{$first ?? ''}}">
                                    </div>
                                    <div class="col-md-5">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="last_name" value="{{$last}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 mb-4">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>Photo</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-10 mb-4">
                                        <label>Confirm Password</label>
                                        <input class="form-control" type="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label>Permissions</label>

                                    <div class="bs-component">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Profile</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cd">D</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cd2">h</a></li>

                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="home">
                                                <div class="animated-checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"><span class="label-text">Show</span>
                                                    </label>
                                                </div>
                                                <div class="animated-checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"><span class="label-text">Create</span>
                                                    </label>
                                                </div>
                                                <div class="animated-checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"><span class="label-text">Update</span>
                                                    </label>
                                                </div>
                                                <div class="animated-checkbox">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"><span class="label-text">Delete</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile">
                                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                                            </div>
                                            <div class="tab-pane fade" id="cd">
                                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                                            </div>
                                            <div class="tab-pane fade" id="cd2">
                                                <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                                            </div>
                                        </div>
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
