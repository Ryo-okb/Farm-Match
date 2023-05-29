<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>ログイン</title>
</head>
<body>
    <form action="{{ route('list') }}" method="POST">
        @csrf
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
            
        </div><br>

        <div>
            <label for="password">パスワード</label>
            <input type="text" id="password" name="password" required>
            
        </div>
        @if (Session::has('error'))
            <div class="red">{{ Session::get('error') }}</div>
        @endif
        <br>


        <button type="submit" class="submit-button">ログイン</button>
    </form>
    <div class="reset">
        <a href="{{route('password.reset')}}">パスワードを忘れた方はこちらへ</a>
    </div>
</body>
</html>
