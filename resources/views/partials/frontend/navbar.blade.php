<!-- Navigation -->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/frontend/logos/logo_hori.png') }}" width="135" alt="拾本書堂">
        </a>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}

        <!-- bars -->
        <div id="sidebarToggle">
            <div id="sidebarContent">
                <div id="searchbox">
                    <div class="btn">
                        <img src="{{ asset('images/frontend/icons/search.png') }}" alt="搜尋">
                    </div>
                    <input type="text" placeholder="Search">
                </div>
                <div id="barbox">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        即時公告/重要消息
                    </a>
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
            </ul>
        </div>
    </div>
</nav>
