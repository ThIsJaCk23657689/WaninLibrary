<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>重設密碼信</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="wrapper" style="">
        <h3><i class="fa fa-handshake-o" aria-hidden="true"></i></h3>
        <h3 style="font-weight:bold;">{{$params['user_name']}}您好</h3>
        <h3 style="font-weight:bold;">由於忘記密碼，您於{{$params['time']}}申請重新設定密碼</h3>
        <h3 style="font-weight:bold;">您的新密碼為:{{$params['new_password']}}</h3>
        <h3 style="font-weight:bold;">請點擊下方連結後以該密碼重新登入後，重新設定密碼</h3>
        <h3><a href="http://localhost/waninlibary/public/" style="a{color:#337ab7;} a:hover{color:#0b5a9e;}">http://localhost/waninlibary/public/</a></h3>
        <h4 style="color:#888;">拾本書堂敬上</h4>
    </div>
</div>

</body>

</html>
