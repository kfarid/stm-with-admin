<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('homeAdmin')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/avatar6.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                {{--<li class="nav-item">
                    <a href="{{route('adminsearch')}}" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Search
                        </p>
                    </a>
                </li>--}}
                <li class="nav-item">
                    <a href="{{route('homeAdmin')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link cas">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Home Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('homepage.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Page</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('homepage.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Page</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Second Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('secondpage.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Page</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('secondpage.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Page</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Third Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('thirdpage.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Page</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('thirdpage.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Page</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Slider
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Slider</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('slider.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Panel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('panel.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Panel</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('panel.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Panel</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Cards
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('card.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Cards</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('card.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Cards</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-share-alt"></i>
                        <p>
                            Social Network
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('social.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Social</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('social.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Social</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @role('admin')
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('user.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-lock"></i>
                        <p>
                            Permissions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Permissions</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                        <li class="nav-item">
                            <a href="{{route('roles.create')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Permissions</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Contact US
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('contactus.index')}}" class="nav-link">
                                <i class="fas fa-eye nav-icon"></i>
                                <p>All Permissions</p>
                            </a>
                        </li>
                        @if(auth()->user()->can('add'))
                            <li class="nav-item">
                                <a href="{{route('contactus.create')}}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>Add Permissions</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                @endrole
                {{--<li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>--}}
                <li class="nav-item">
                    <a href="{{route('contact.index')}}" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="{{route('setting.index')}}" class="nav-link">
                                <i class="nac-icon fas fa-cog"></i>
                                <p>
                                    Basic Setting
                                </p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nac-icon fab fa-google"></i>
                                <p>
                                    Google
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: block;">
                                <li class="nav-item">
                                    <a href="{{route('google.index')}}" class="nav-link">
                                        <i class="fas fa-eye nav-icon"></i>
                                        <p>All Google Setting</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('google.create')}}" class="nav-link">
                                        <i class="fas fa-plus nav-icon"></i>
                                        <p>Add Google Setting</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
