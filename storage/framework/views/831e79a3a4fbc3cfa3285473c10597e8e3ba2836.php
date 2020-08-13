<?php $__env->startSection('main'); ?>
<div id="siswa">
    <h2>Edit Data Siswa</h2>
    <?php echo Form::model($siswa, ['method'=>'PATCH', 'files'=>'true', 'action'=>['SiswaController@update', $siswa->id]]); ?>

    <?php echo $__env->make('siswa.form', ['submitButtonText'=>'Update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba1\resources\views/siswa/edit.blade.php ENDPATH**/ ?>