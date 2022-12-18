<nav class="navbar bg-light fixed-top">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">DealerSites</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="menu" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">

                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">DealerSites</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>

            </div>

            <div class="offcanvas-body">

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 list-group">
                    <li class="nav-item">
                        <a class="list-group-item" href="{{ route('users.index') }}">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="list-group-item link-danger" href="#" id="logout">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</nav>
