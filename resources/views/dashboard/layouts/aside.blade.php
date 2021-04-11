<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" style="width: 80px!important;" src="{{asset('uploads/admins/'.auth()->guard('web')->user()->image)}}" alt="{{auth()->guard('web')->user()->name}}">
        <div>
            <p class="app-sidebar__user-name">{{auth()->guard('web')->user()->name}}</p>
            <p class="app-sidebar__user-designation">
                @php
                    $name = explode("_", implode(', ', auth()->guard('web')->user()->roles->pluck('name')->toArray()));
                    $lastname = ucfirst(array_pop($name));
                    $firstname = ucfirst(implode("_", $name));
                    echo $firstname.' '.$lastname;
                @endphp
            </p>
        </div>
    </div>

    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{is_Active('home')}}" href="{{route('dashboard.index')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->hasPermission('users_read'))
            <li>
                <a class="app-menu__item {{is_Active('admin')}}" href="{{route('admin.index')}}">
                    <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                    <span class="app-menu__label">Admins</span>
                </a>
            </li>
        @endif
        <li class="treeview">
            <a class="app-menu__item {{is_Active('category')}}" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span>
                <i class="treeview-indicator fa fa-angle-right"></i>

            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item {{is_Active('category')}}" href="{{route('category.index')}}">
                        <i class="icon fa {{is_Active('category') == 'active' ? 'fa-stop-circle-o' : 'fa-circle-o'}}"
                           style="{{is_Active('category') == 'active' ? 'color: #28B463' : ''}} "   aria-hidden="true"></i>
                        Main Category</a>
                </li>
                <li>
                    <a class="treeview-item {{is_Active('subcategory') }}" href="{{route('subcategory.index')}}">
                        <i class="icon fa {{is_Active('subcategory') == 'active' ? 'fa-stop-circle-o' : 'fa-circle-o'}}"
                           style="{{is_Active('subcategory') == 'active' ? 'color: #28B463' : ''}}"
                        ></i>
                        Sub Category</a>
                </li>
                <li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item {{is_Active('brand')}}" href="{{route('brand.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-shopping-cart"></i>
                <span class="app-menu__label">Products</span>
                <i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li>
                    <a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener">
                        <i class="icon fa fa-circle-o">
                        </i> Font Icons</a></li>
                <li>
                    <a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a>
                </li>
                <li>
                    <a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a>
                </li>
                <li>
                    <a class="treeview-item {{is_Active('brand')}}" href="{{route('brand.index')}}">
                        <i class="app-menu__icon fa {{is_Active('brand') == 'active' ? 'fa-stop-circle-o' : 'fa-circle-o'}}"
                           style="{{is_Active('brand') == 'active' ? 'color: #28B463' : ''}}"
                        >
                        </i>
                        Brands
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="app-menu__item {{is_Active('newsletters')}}" href="{{route('newsletters.index')}}">
                <i class="app-menu__icon fa fa-share-alt"></i>
                <span class="app-menu__label">Subscriptions</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{is_Active('coupon')}}" href="{{route('coupon.index')}}">
                <i class="app-menu__icon fa fa-ticket"></i>
                <span class="app-menu__label">Coupons</span>
            </a>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label"> Clients </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
            </ul>
        </li>




        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
            </ul>
        </li>





    </ul>
</aside>
