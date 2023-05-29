<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>マイページ</title>
</head>
<body>
   @include('header')
    <div class="main-container">
        <h2>予約した土地情報</h2>
            <div class="post-container">
                @foreach($reservedLands as $reservation)
                    <div class="post">
                        <div class="postimg2">
                            <img src="{{ asset('storage/images/' . $reservation->land->image) }}" alt="Land Image">
                        </div>
                        <div class="post-details">
                            
                            <p>投稿者: {{ $reservation->land->name }}</p>
                            <p>住所: {{ $reservation->land->address }}</p>
                            <p>予約日: {{ $reservation->reservation_date }}</p>
                            <!-- 他の予約情報の表示 -->
                        </div>
                    </div><br>
                @endforeach
            </div>
            <h2>投稿した土地情報</h2>
            <div class="post-container">
                @foreach($postedLands as $land)
                    <div class="post">
                        <div class="postimg2">
                            <img src="{{ asset('storage/images/' . $land->image) }}" alt="Land Image">
                        </div>
                        <div class="post-details">
                            
                            <p>投稿者: {{ $land->name }}</p>
                            <p>住所: {{ $land->address }}</p>
                            <a href="{{route('editPost',['id' => $land->id])}}">編集</a>
                            <form action="{{ route('delete', ['id' => $land->id]) }}" method="POST" onsubmit="return confirmDelete();" class="delete-form">
                                @method('PUT')
                                @csrf
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    </div>
                            <h4>予約情報:</h4>
                            @foreach($land->reservations as $reservation)
                            <p>予約された名前: {{ $reservation->user->name }}</p>
                                <p>予約日程: {{ $reservation->reservation_date }}</p>
                            @endforeach
                @endforeach
            </div>
         </div>

    <script>
        function confirmDelete() {
            if (confirm("本当に削除しますか？")) {
                return true; // 削除を実行する
            } else {
                return false; // 削除をキャンセルする
            }
        }
    </script>
</body>
</html>


