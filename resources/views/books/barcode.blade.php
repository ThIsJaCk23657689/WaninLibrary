<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
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