<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>詳細</title>
</head>
<body>
@include('header')
    <div class="detail-flex">
        <div class="postimgdt">
            <img src="{{ asset('storage/images/' . $land->image) }}" alt="Land Image">
        </div>
        <table class="detail-table">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>住所</th>
                    <th>面積</th>
                    <th>用途</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $land->name }}</td>
                    <td>{{ $land->address }}</td>
                    <td>{{ $land->area }}㎡</td>
                    <td>{{ $land->way }}</td>                    
                </tr>
            </tbody>
        </table>  
        <a href="{{ route('reservation', ['id' => $land->id]) }}">予約する</a>
    </div>

</body>
</html>
