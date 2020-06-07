<!-- Navigation -->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            拾本書堂
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

        <div id="navSidebar">
            <button id="closeBtn" type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        關於網銀
                        <div class="underline"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        即時公告/重要消息
                        <div class="underline"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        近期活動
                        <div class="underline"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        查詢館藏
                        <div class="underline"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        捐書芳名錄
                        <div class="underline"></div>
                    </a>
                </li>
            </ul>
            <ul id="bottomSidebar" class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link search">
                        <img src="{{ asset('images/frontend/icons/search_blue.png') }}" alt="search">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('images/frontend/icons/facebook_blue.png') }}" alt="facebook">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('images/frontend/icons/web_blue.png') }}" alt="web">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="{{ asset('images/frontend/icons/instagram_blue.png') }}" alt="instagram">
                    </a>
                </li>
            </ul>
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
