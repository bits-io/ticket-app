<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">

        </div>
        <div class="header-right">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                            <ul class="clearfix">
                                <li class="icons dropdown">
                                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                        <span class="activity active"></span>
                                        <img src="https://img.icons8.com/color/96/null/gender-neutral-user.png" height="40" width="40" alt="">
                                    </div>
                                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="icon-user"></i> <span>Profile</span></a>
                                                </li>
                                                <hr class="my-2">
                                                <li><a href="{{route('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline ">Log in</a>

                        @if (Route::has('registration'))
                            <a href="{{ route('registration') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

    </div>
</div>
