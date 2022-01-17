<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Simple Task App</a>
        </div>
        <ul class="nav navbar-nav">
            <li @yield('nav_status_dashboard')><a href="{{ url('/dashboard') }}">DashBoard</a></li>
            <li @yield('nav_stauts_task')><a href="#">Task</a></li>
            <li @yield('nav_stauts_category')><a href="{{ url('/categories') }}">Category</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            {{-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link" style="padding-top: 15px;"><span
                            class="glyphicon glyphicon-log-out"></span>Logout</button>
                </form>
            </li>

        </ul>
    </div>
</nav>
