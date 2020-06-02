<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>書籍即將逾期通知</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="wrapper" style="">
        <h3><i class="fa fa-handshake-o" aria-hidden="true"></i></h3>
        <h3 style="font-weight:bold;">{{$details['name']}}您好</h3>
        <h3 style="font-weight:bold;">您所借的書籍 {{$details['book_title']}}</h3>
        <h3 style="font-weight:bold;">即將於{{$details['return_date']}} 逾期</h3>
        <h3 style="font-weight:bold;"></h3>
        {{-- <h3><a href="http://localhost/waninlibary/public/" style="a{color:#337ab7;} a:hover{color:#0b5a9e;}">http://localhost/waninlibary/public/</a></h3> --}}
        <h4 style="color:#888;">網銀基金會敬上</h4>
    </div>
</div>

</body>

</html>
