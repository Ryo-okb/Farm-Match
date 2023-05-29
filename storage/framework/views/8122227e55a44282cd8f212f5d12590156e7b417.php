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
<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-container">
    <div class="table-container">
        <?php $__currentLoopData = $lands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $land): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
            <table>
                <tbody>
                    <tr>
                        <td>
                            <div class="postimg">
                                <img src="<?php echo e(asset('storage/images/' . $land->image)); ?>" alt="Land Image">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>投稿者：<?php echo e($land->name); ?></td>
                    </tr>
                    <tr>
                        <td>場所：<?php echo e($land->address); ?></td>
                    </tr>
                    <tr>
                        <td>面積：<?php echo e($land->area); ?>㎡</td>
                    </tr>
                    <tr>
                        <td>用途：<?php echo e($land->way); ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo e(route('detail',['id' => $land->id])); ?>">詳細</a></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/list.blade.php ENDPATH**/ ?>