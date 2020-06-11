<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../sass/app.scss">
    <title>Minha View</title>
    <style>
        * {font-family: 'Roboto';}th { text-align:left;}td {font-size: 1em;align-items: center;/* justify-content: start; */border-bottom: 1px solid #dcdcdc;padding-bottom: 2px;width: 100px;}th, td {padding-left:15px;}.test {width: 50px !important;border-right: 1px solid #dcdcdc;}table { margin-left: 50px;}
    </style>
</head>
<body>
    <table>
        <tr>
            <th class="test">ID</th>
            <th>Produto</th>
        </tr>
        @foreach ($teste as $id => $item)
            <tr>
            <td class="test">{{$id}}</td>
                <td>{{$item}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>