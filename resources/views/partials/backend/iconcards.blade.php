<!-- Icon Cards-->
<div class="row">

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-donate"></i>
                </div>
                <div class="mr-5">書籍捐贈報表</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('statistic.donated.export') }}">
                <span class="float-left">按此下載</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-basket"></i>
                </div>
                <div class="mr-5">書籍採購報表</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('statistic.boughtbooks.export') }}">
                <span class="float-left">按此下載</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-book-reader"></i>
                </div>
                <div class="mr-5">書籍借閱報表</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('statistic.borrowlogs.export') }}">
                <span class="float-left">按此下載</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-book"></i>
                </div>
                <div class="mr-5">熱門書籍報表</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('statistic.topbooks.export') }}">
                <span class="float-left">按此下載</span>
                <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

</div>
