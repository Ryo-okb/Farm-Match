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
    <form action="<?php echo e(route('list')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            
        </div><br>

        <div>
            <label for="password">パスワード</label>
            <input type="text" id="password" name="password" required>
            
        </div>
        <?php if(Session::has('error')): ?>
            <div class="red"><?php echo e(Session::get('error')); ?></div>
        <?php endif; ?>
        <br>


        <button type="submit" class="submit-button">ログイン</button>
    </form>
    <div class="reset">
        <a href="<?php echo e(route('password.reset')); ?>">パスワードを忘れた方はこちらへ</a>
    </div>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/login.blade.php ENDPATH**/ ?>