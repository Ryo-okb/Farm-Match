<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>パスワードリセット</title>
</head>
<body>
    <form action="{{ route('reset.password') }}" method="POST">
        @csrf
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="tel">電話番号</label>
            <input type="text" id="tel" name="tel" value="{{ old('tel') }}" required>
            @error('tel')
                <div class="red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">新しいパスワード</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">新しいパスワード（確認）</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">パスワードリセット</button>
    </form>
</body>
</html>
