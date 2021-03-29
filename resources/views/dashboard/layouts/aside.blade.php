<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar w-25" src="{{asset('uploads/admins/'.auth()->guard('web')->user()->image)}}" alt="{{auth()->guard('web')->user()->name}}">
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
            <a class="app-menu__item active" href="{{route('dashboard.index')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        @if(auth()->user()->hasPermission('users_read'))
        <li>
            <a class="app-menu__item " href="{{route('admin.index')}}">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                    <span class="app-menu__label">Admins</span>
            </a>
        </li>
        @endif
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span>
                <i class="treeview-indicator fa fa-angle-right"></i>

            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('category.index')}}">
                        <i class="icon fa fa-stop-circle-o" style="color: #28B463" aria-hidden="true"></i>
                        Main Category</a></li>
                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Sub Category</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Brand</a></li>
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
