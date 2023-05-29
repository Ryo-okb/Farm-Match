<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>一覧</title>
</head>
<body>
@include('header')

<div class="main-container">
    <div class="table-container">
        @foreach ($lands as $land)
      
            <table>
                <tbody>
                    <tr>
                        <td>
                            <div class="postimg">
                                <img src="{{ asset('storage/images/' . $land->image) }}" alt="Land Image">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>投稿者：{{ $land->name }}</td>
                    </tr>
                    <tr>
                        <td>場所：{{ $land->address }}</td>
                    </tr>
                    <tr>
                        <td>面積：{{ $land->area }}㎡</td>
                    </tr>
                    <tr>
                        <td>用途：{{ $land->way }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('detail',['id' => $land->id]) }}">詳細</a></td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>
</body>
</html>
