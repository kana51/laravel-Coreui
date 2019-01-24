<header class="app-header navbar">

    <!-- toggle -->
    <!-- <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <a class="navbar-brand position-static m-0" href="#">Brand</a>
    <!-- <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <ul class="nav navbar-nav">
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('admin.logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

        </li>
    </ul>

</header>