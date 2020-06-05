<nav id="navbar" class="navbar navbar-expand fixed-top">
    <a class="navbar-brand mr-1" href="{{ route('index') }}">
        拾本書堂
    </a>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">即時公告/重要消息</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">近期活動</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">查詢館藏</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">捐書芳名錄</a>
        </li>

        {{-- <li class="nav-item dropdown no-arrow mx-1">
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
        </li> --}}

        {{-- <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw mr-2"></i>{{ Auth::user()->name }}
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
        </li> --}}

    </ul>

    <!-- bars -->
    <div id="sidebarToggle">
        <div id="searchbox">
            <img src="{{ asset('images/frontend/icons/search.png') }}" alt="搜尋">
        </div>
        <div id="barbox">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>
