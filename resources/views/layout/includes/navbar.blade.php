<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Mini CRM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{route('home.index')}}">Home</a>
            @if (auth()->guest())
                <a class="nav-item nav-link" href="{{route('auth.login')}}">Login</a>
            @endif
            @if (!auth()->guest())
                @if (auth()->user()->is_admin)
                    <a class="nav-item nav-link" href="{{route('company.index')}}">Companies</a>
                @endif
                <a class="nav-item nav-link" href="{{route('employee.index')}}">Employees</a>
                <a class="nav-item nav-link" href="{{route('auth.logout')}}">Logout</a>
            @endif
        </div>
    </div>
</nav>
