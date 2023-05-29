<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>toppage</title>
</head>
<div class="title">Farm Match</div>
    <div class="signflex">  
        <div class="login"><a href="<?php echo e(route('login')); ?>">ログイン</a></div>
        <div class="signup"><a href="<?php echo e(route('showsignup')); ?>">新規登録</a></div>
    </div>  
    
<body style="background:url(<?php echo e(asset('img/top1.jpg')); ?>);
background-size:cover;">
<div class="catch-container">
    <div class="catch">
        <p>農業で日本を豊かに</p>
    </div>
    <div>
        <p> ※農地の譲渡は、農業委員会からの許可が必要です。<br>
         詳しくはこちら→<a href="https://www.maff.go.jp/j/keiei/koukai/wakariyasu.html">農林水産省:農地法</a></p>
    </div>
</div>
</body>
</html><?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/top.blade.php ENDPATH**/ ?>