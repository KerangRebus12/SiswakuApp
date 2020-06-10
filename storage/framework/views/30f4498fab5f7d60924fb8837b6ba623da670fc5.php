<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="<?php echo e(asset('bootstrap_4_4_1/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('main'); ?>
    </div>
    <?php echo $__env->yieldContent('footer'); ?>
<script src="<?php echo e(asset('js/jquery_2_2_1.min.js')); ?>"></script>
<script src="<?php echo e(asset('bootsrap_4_4_1/js/bootsrap.min.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\coba1\resources\views/template.blade.php ENDPATH**/ ?>