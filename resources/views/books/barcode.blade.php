<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        font-family: '微軟正黑體';
    }
    /* #barcode{
        border: solid;
        border-color: #FF0000;
        padding: 0px 30px 0px 30px;
    } */
</style>
<body>
    <table id="barcode">
        <tbody>
            <tr>
                <td style="text-align:center;">網銀基金會 / 拾本書堂</td>
            </tr>
            <tr>
                <td><img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($book->barcode, 'C128') }}" alt="barcode"   /></td>
            </tr>
            <tr>
                <td style="text-align:center;">{{ $book->barcode }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>