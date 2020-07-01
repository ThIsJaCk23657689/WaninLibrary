<!-- Navigation -->
<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('images/frontend/logos/logo_hori.png') }}" width="160" alt="拾本書堂">
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
                <li class="nav-item {{ ($active_num == 1)?'active':'' }}">
                    <a class="nav-link" href="#">{{-- {{ route('front.announcements') }} --}}
                        即時公告/重要訊息
                    </a>
                </li>
                <li class="nav-item dropdown no-arrow {{ ($active_num == 2)?'active':'' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="activitiesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        近期活動
                    </a>
                    <div class="dropdown-menu" aria-labelledby="activitiesDropdown">
                        <a class="dropdown-item" href="{{ route('front.activities') }}">{{-- {{ route('front.activities') }} --}}
                            <span>近期活動</span>
                        </a>
                        <a class="dropdown-item" href="{{ route('front.recommandations') }}">{{-- {{ route('front.recommandations') }} --}}
                            <span>主題書單</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item {{ ($active_num == 3)?'active':'' }}">
                    <a class="nav-link" href="#">館藏查詢</a>{{-- {{ route('front.books') }} --}}
                </li>
                <li class="nav-item dropdown no-arrow {{ ($active_num == 4)?'active':'' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="donorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        捐書芳名錄
                    </a>
                    <div class="dropdown-menu" aria-labelledby="donorDropdown">
                        <a class="dropdown-item" href="#">{{-- {{ route('front.donors') }} --}}
                            <span>捐書芳名錄</span>
                        </a>
                        <a class="dropdown-item" href="#">{{-- {{ route('front.donatedBooks') }} --}}
                            <span>捐贈書籍查詢</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
