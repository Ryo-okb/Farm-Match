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

<form action="<?php echo e(route('signcomp')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="signupform">
        名前<br><input type="text" name="name" value="<?php echo e(old('name')); ?>">
        <br>
        <div class="red">
            <?php if($errors->has('name')): ?>
                <?php echo e($errors->first('name')); ?>

            <?php endif; ?>
        </div><br>
        電話番号<br><input type="text" name="tel" value="<?php echo e(old('tel')); ?>">
        <br>
        <div class="red">
            <?php if($errors->has('tel')): ?>
                <?php echo e($errors->first('tel')); ?>

            <?php endif; ?>
        </div><br>
        メールアドレス<br><input type="text" name="email" value="<?php echo e(old('email')); ?>">
        <br>
        <div class="red">
            <?php if($errors->has('email')): ?>
                <?php echo e($errors->first('email')); ?>

            <?php endif; ?>
        </div><br> 
        住所<br><input type="text" name="address" value="<?php echo e(old('address')); ?>">
        <br>
        <div class="red">
            <?php if($errors->has('address')): ?>
                <?php echo e($errors->first('address')); ?>

            <?php endif; ?>
        </div><br>
        パスワード<br><input type="text" name="password" value="<?php echo e(old('pass')); ?>">
        <br>
        <div class="red">
            <?php if($errors->has('pass')): ?>
                <?php echo e($errors->first('pass')); ?>

            <?php endif; ?>
        </div><br>
        <button type="submit" class="submit-button">新規登録</button>    
    </div>
</form>

</body><?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/signup.blade.php ENDPATH**/ ?>