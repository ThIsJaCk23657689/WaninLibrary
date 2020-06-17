<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
		<a class="nav-link" href="{{ route('backend') }}">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>{{ __('Dashboard') }}</span>
		</a>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-user-friends"></i>
			<span>{{ __('People Management') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">{{ __('Basic:') }}</h6>
            @if (auth('api')->user()->status == 0)
                <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('Admins') }}</a>
            @endif
			<a class="dropdown-item" href="{{ route('borrowers.index') }}">{{ __('Borrowers') }}</a>
			<a class="dropdown-item" href="{{ route('donors.index') }}">{{ __('Donors') }}</a>
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">{{ __('Related:') }}</h6>
			<a class="dropdown-item" href="{{ route('agencies.index') }}">{{ __('Agencies') }}</a>
		</div>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-book-open"></i>
			<span>{{ __('Books Management') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
			<a class="dropdown-item" href="{{ route('books.index') }}">{{ __('Books') }}</a>
			{{-- <a class="dropdown-item" href="#">{{ __('Purchase') }}</a>
			<a class="dropdown-item" href="#">{{ __('Donate') }}</a> --}}
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">{{ __('Related:') }}</h6>
			<a class="dropdown-item" href="{{ route('books.create') }}">新增書本</a>
		</div>
	</li>

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-exchange-alt"></i>
			<span>{{ __('Circulation') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
			{{-- <a class="dropdown-item" href="{{ route('circulation') }}">借書與還書</a> --}}
			<a class="dropdown-item" href="{{ route('circulation.showBorrowPage') }}">書籍出借</a>
			<a class="dropdown-item" href="{{ route('unreturns.index') }}">借出與逾期</a>
		</div>
    </li>

    @if (auth('api')->user()->status == 0)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog"></i>
                <span>{{ __('General Settings') }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">{{ __('Basic:') }}</h6>
                <a class="dropdown-item" href="{{ route('announcements.index') }}">{{ __('News') }}</a>
            <a class="dropdown-item" href="{{ route('activities.index' )}}">{{ __('Events') }}</a>
                <a class="dropdown-item" href="{{ route('recommendation.index') }}">{{ __('Recommend') }}</a>
                <a class="dropdown-item" href="{{ route('information.index') }}">{{ __('Information') }}</a>
                <a class="dropdown-item" href="{{ route('information.donate') }}">好書捐贈</a>
            </div>
        </li>
    @endif


    <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="far fa-file-alt"></i>
			<span>{{ __('Log File') }}</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
            <a class="dropdown-item" href="{{ route('loginLogs.index') }}">{{ __('Login') }}</a>
			<a class="dropdown-item" href="{{ route('borrowLogs.index') }}">借還書</a>
		</div>
	</li>

	{{-- <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="far fa-chart-bar"></i>
			<span>{{ __('Statistics') }}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">{{ __('Basic:') }}</h6>
            <a class="dropdown-item" href="{{ route('statistic.chart.index') }}">{{ __('Chart') }}</a>
			<a class="dropdown-item" href="{{ route('statistic.export.index') }}">{{ __('Export') }}</a>
		</div>
	</li> --}}

</ul>
