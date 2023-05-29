<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>マイページ</title>
</head>
<body>
   <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-container">
        <h2>予約した土地情報</h2>
            <div class="post-container">
                <?php $__currentLoopData = $reservedLands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post">
                        <div class="postimg2">
                            <img src="<?php echo e(asset('storage/images/' . $reservation->land->image)); ?>" alt="Land Image">
                        </div>
                        <div class="post-details">
                            
                            <p>投稿者: <?php echo e($reservation->land->name); ?></p>
                            <p>住所: <?php echo e($reservation->land->address); ?></p>
                            <p>予約日: <?php echo e($reservation->reservation_date); ?></p>
                            <!-- 他の予約情報の表示 -->
                        </div>
                    </div><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <h2>投稿した土地情報</h2>
            <div class="post-container">
                <?php $__currentLoopData = $postedLands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $land): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="post">
                        <div class="postimg2">
                            <img src="<?php echo e(asset('storage/images/' . $land->image)); ?>" alt="Land Image">
                        </div>
                        <div class="post-details">
                            
                            <p>投稿者: <?php echo e($land->name); ?></p>
                            <p>住所: <?php echo e($land->address); ?></p>
                            <a href="<?php echo e(route('editPost',['id' => $land->id])); ?>">編集</a>
                            <form action="<?php echo e(route('delete', ['id' => $land->id])); ?>" method="POST" onsubmit="return confirmDelete();" class="delete-form">
                                <?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    </div>
                            <h4>予約情報:</h4>
                            <?php $__currentLoopData = $land->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p>予約された名前: <?php echo e($reservation->user->name); ?></p>
                                <p>予約日程: <?php echo e($reservation->reservation_date); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>

    <script>
        function confirmDelete() {
            if (confirm("本当に削除しますか？")) {
                return true; // 削除を実行する
            } else {
                return false; // 削除をキャンセルする
            }
        }
    </script>
</body>
</html>


<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/mypage.blade.php ENDPATH**/ ?>