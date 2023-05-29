<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/app.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <title>予約フォーム</title>
</head>
<body>
    <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h1>予約フォーム</h1>
    <form action="<?php echo e(route('reservecomp')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <!-- 予約フォームの入力フィールドなどを追加してください -->
        <input type="hidden" name="land_id" value="<?php echo e($land->id); ?>">
       

        <!-- 他のユーザー情報を表示する場合は、$user->プロパティ名 を使用してアクセス -->
        <div class="form-container">
            <p class="bold">土地情報</p>
            <p>投稿者: <?php echo e($land->name); ?></p>
            <p>住所: <?php echo e($land->address); ?></p>
            <p>面積: <?php echo e($land->area); ?>㎡    </p>
            <p>用途: <?php echo e($land->way); ?></p>
        </div>
        <label for="reservation_date">予約日:</label>
        <input type="text" name="reservation_date" id="reservation_date" readonly required>

        <label for="reservation_time">予約時間:</label>
        <select name="reservation_time" id="reservation_time" required>
            <?php for($hour = 9; $hour <= 17; $hour++): ?>
                <?php for($minute = 0; $minute < 60; $minute += 60): ?>
                    <?php
                        $time = sprintf("%02d:%02d", $hour, $minute);
                    ?>
                    <option value="<?php echo e($time); ?>"><?php echo e($time); ?></option>
                <?php endfor; ?>
            <?php endfor; ?>
        </select><br><br>   

        <button type="submit" class="submit-button">予約</button>
        <!-- 予約フォームの入力フィールドなどを追加してください -->
    </form>

    <script>
        var availableDates = <?php echo json_encode($availableDates, 15, 512) ?>;

        $(document).ready(function() {
            // 予約日のDatePickerを設定
            $("#reservation_date").datepicker({
                dateFormat: "yy-mm-dd",
                minDate: 0, // 今日以降の日付のみ選択可能
                beforeShowDay: function(date) {
                    // 利用可能な日程のみ有効にする
                    var dateString = $.datepicker.formatDate("yy-mm-dd", date);
                    return [availableDates.includes(dateString)];
                }
            });
        });
    </script>
</body>
</html>

<?php /**PATH /Applications/MAMP/htdocs/farm/resources/views/reservation.blade.php ENDPATH**/ ?>