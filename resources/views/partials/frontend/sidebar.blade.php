<div id="navSidebar">
    <button id="closeBtn" type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('front.about') }}">
                關於拾本書堂
                <div class="underline"></div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('front.announcements') }}">
                即時公告/重要訊息
                <div class="underline"></div>
            </a>
        </li>
        
        <li class="nav-item mutilink">
            <a class="nav-link mutilink-title" href="#">
                近期活動
                <div class="underline"></div>
            </a>
            <div class="mutilink-menu">
                <a class="mutilink-item" href="{{ route('front.activities') }}">
                    <span>近期活動</span>
                    <div class="underline"></div>
                </a>
                <a class="mutilink-item" href="{{ route('front.recommandations') }}">
                    <span>主題書單</span>
                    <div class="underline"></div>
                </a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('front.books') }}">
                館藏查詢
                <div class="underline"></div>
            </a>
        </li>

        <li class="nav-item mutilink">
            <a class="nav-link mutilink-title" href="#">
                捐書芳名錄
                <div class="underline"></div>
            </a>
            <div class="mutilink-menu">
                <a class="mutilink-item" href="{{ route('front.donors') }}">
                    <span>捐書芳名錄</span>
                    <div class="underline"></div>
                </a>
                <a class="mutilink-item" href="{{ route('front.donatedBooks') }}">
                    <span>捐贈書籍查詢</span>
                    <div class="underline"></div>
                </a>
            </div>
        </li>
    </ul>
    <div class="navbar-bottom">
        <ul class="navbar-nav-bottom">
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
        <div id="search">
            <form action="#" method="GET">
                <div class="inputBox">
                    <input type="text" placeholder="Search">
                    <button type="submit">
                        <img src="{{ asset('images/frontend/icons/search.png') }}" alt="搜尋">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
