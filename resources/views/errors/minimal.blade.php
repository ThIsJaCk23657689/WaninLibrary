<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSRF Token -->
        <title>拾本書堂 - @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
        <link href="{{ asset('css/errors.css') }}" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: '微軟正黑體';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .flex-row{
                display: flex;
                flex-grow: 1;
                width: 100%;
            }

            .padding-30vh{
                padding: 30vh;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="page-wrap d-flex flex-row align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <span class="display-1 d-block">@yield('code')</span>
                        <div class="mb-2 lead">@yield('message')</div>
                        <button type="button" class="btn btn-md btn-secondary" onclick="history.go(-1)">回上一頁</button>
                        <a href="{{ route('backend') }}" class="btn btn-md btn-primary">回到後台首頁</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
