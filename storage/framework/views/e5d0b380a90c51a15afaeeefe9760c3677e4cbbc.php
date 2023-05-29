<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>土地情報編集</title>
</head>
<body>
    <h2>土地情報編集</h2>

    <form action="<?php echo e(route('updatePost', $land->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>


        <div>
            <label for="image">画像</label>
            <input type="file" id="image" name="image">
        </div>

        <div>
            <label for="address">住所</label>
            <input type="text" id="address" name="address" value="<?php echo e($land->address); ?>" required>
        </div>

        <div>
            <label for="area">面積</label>
            <input type="text" id="area" name="area" value="<?php echo e($land->area); ?>" required>
        </div>

        <div>
            <label for="way">用途</label>
            <input type="text" id="way" name="way" value="<?php echo e($land->way); ?>" required>
        </div>

      

        <div>
            <button type="submit">更新</button>
        </div>
    </form>
</body>
<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/edit.blade.php ENDPATH**/ ?>