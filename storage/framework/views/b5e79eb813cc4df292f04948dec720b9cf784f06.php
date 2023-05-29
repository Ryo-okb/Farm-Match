<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>詳細</title>
</head>
<body>
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="detail-flex">
        <div class="postimgdt">
            <img src="<?php echo e(asset('storage/images/' . $land->image)); ?>" alt="Land Image">
        </div>
        <table class="detail-table">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>住所</th>
                    <th>面積</th>
                    <th>用途</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($land->name); ?></td>
                    <td><?php echo e($land->address); ?></td>
                    <td><?php echo e($land->area); ?>㎡</td>
                    <td><?php echo e($land->way); ?></td>                    
                </tr>
            </tbody>
        </table>  
        <a href="<?php echo e(route('reservation', ['id' => $land->id])); ?>">予約する</a>
    </div>

</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/detail.blade.php ENDPATH**/ ?>