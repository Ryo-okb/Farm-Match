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
<h1>投稿・予約情報  一覧</h1>
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
                        <td>
                            <h3>予約情報:</h3>
                            @foreach($land->reservations as $reservation)
                                <p>予約者名: {{ $reservation->user->name }}</p>
                                <p>予約日程: {{ $reservation->reservation_date }}</p>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ route('editPost', ['id' => $land->id]) }}">編集</a>
                            <form action="{{ route('admindelete', ['id' => $land->id]) }}" method="POST" onsubmit="return confirmDelete()" class="delete-form">
                                @csrf
                                @method('PUT')
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
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

    function showAlert() {
        const error = '{{ session('error') }}';
        const status = '{{ session('status') }}';

        if (error) {
            alert(error);
        } else if (status) {
            alert(status);
        }
    }

    window.addEventListener('DOMContentLoaded', showAlert);
</script>
</body>
</html>
