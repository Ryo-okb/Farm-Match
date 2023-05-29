<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>新規登録画面</title>
</head>
<body>

<form action="{{ route('signcomp') }}" method="post">
    @csrf
    <div class="signupform">
        名前<br><input type="text" name="name" value="{{ old('name') }}">
        <br>
        <div class="red">
            @if ($errors->has('name'))
                {{$errors->first('name')}}
            @endif
        </div><br>
        電話番号<br><input type="text" name="tel" value="{{ old('tel') }}">
        <br>
        <div class="red">
            @if ($errors->has('tel'))
                {{$errors->first('tel')}}
            @endif
        </div><br>
        メールアドレス<br><input type="text" name="email" value="{{ old('email') }}">
        <br>
        <div class="red">
            @if ($errors->has('email'))
                {{$errors->first('email')}}
            @endif
        </div><br> 
        住所<br><input type="text" name="address" value="{{ old('address') }}">
        <br>
        <div class="red">
            @if ($errors->has('address'))
                {{$errors->first('address')}}
            @endif
        </div><br>
        パスワード<br><input type="text" name="password" value="{{ old('pass') }}">
        <br>
        <div class="red">
            @if ($errors->has('pass'))
                {{$errors->first('pass')}}
            @endif
        </div><br>
        <button type="submit" class="submit-button">新規登録</button>    
    </div>
</form>

</body>