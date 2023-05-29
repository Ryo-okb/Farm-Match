<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>投稿フォーム</title>
</head>
<body>
@include('header')
    <h1>投稿フォーム</h1>
    
    <form action="{{ route('postcomp') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">画像</label>
            <input type="file" id="image" name="image">
            @error('image')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

     
        <div>
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="○○県○○市○○番地" required>
            
            @error('address')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="area">面積</label>
            <input type="text" id="area" name="area" value="{{ old('area') }}" placeholder="100" required>㎡
            @error('area')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="way">用途</label>
            <input type="text" id="way" name="way" value="{{ old('way') }}" placeholder="耕種・果樹・畜産　等" required>
            @error('way')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">投稿</button>
    </form>
</body>