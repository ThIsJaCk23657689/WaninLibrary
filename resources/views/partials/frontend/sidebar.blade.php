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
    <div class="bottom">
        <ul id="bottomSidebar" class="navbar-nav">
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