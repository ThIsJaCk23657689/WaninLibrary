<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="{{ route('backend') }}">{{ __('Backend') }}</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="{{ __('Search for...') }}" aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger" style="margin:0; margin-left:-6px;">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">通知1</a>
                <a class="dropdown-item" href="#">通知2</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">查看通知列表</a>
                <a class="dropdown-item" href="#">已讀所有通知</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('users.edit', [auth('api')->id()]) }}">{{ __('Profile') }}</a>
                <a class="dropdown-item" href="{{ route('auth.showResetPasswordForm') }}">{{ __('Change Password') }}</a>
                <div class="dropdown-divider"></div>
                <a id="logoutBtn" class="dropdown-item" href="#">{{ __('Logout') }}</a>
                <form id="logout_form" action="{{ route('api.logout') }}" method="POST" style="displat: none;">
                    @csrf
                </form>
            </div>
        </li>

        @include('partials.backend.modals.logoutMsg')

    </ul>
</nav>
