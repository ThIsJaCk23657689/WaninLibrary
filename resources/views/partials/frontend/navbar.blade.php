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
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="activitiesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        近期活動
                    </a>
                    <div class="dropdown-menu" aria-labelledby="activitiesDropdown">
                        <a class="dropdown-item" href="#">
                            <span>近期活動</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <span>主題書單</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">查詢館藏</a>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="donorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        捐書芳名錄
                    </a>
                    <div class="dropdown-menu" aria-labelledby="donorDropdown">
                        <a class="dropdown-item" href="#">
                            <span>捐書芳名錄</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <span>捐贈書籍查詢</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
