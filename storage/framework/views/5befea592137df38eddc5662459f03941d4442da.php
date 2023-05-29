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
<h1>投稿・予約情報  一覧</h1>
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
                        <td>
                            <h3>予約情報:</h3>
                            <?php $__currentLoopData = $land->reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p>予約者名: <?php echo e($reservation->user->name); ?></p>
                                <p>予約日程: <?php echo e($reservation->reservation_date); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('editPost', ['id' => $land->id])); ?>">編集</a>
                            <form action="<?php echo e(route('admindelete', ['id' => $land->id])); ?>" method="POST" onsubmit="return confirmDelete()" class="delete-form">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
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

    function showAlert() {
        const error = '<?php echo e(session('error')); ?>';
        const status = '<?php echo e(session('status')); ?>';

        if (error) {
            alert(error);
        } else if (status) {
            alert(status);
        }
    }

    window.addEventListener('DOMContentLoaded', showAlert);
</script>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/admin-list.blade.php ENDPATH**/ ?>