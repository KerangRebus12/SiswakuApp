<?php $__env->startSection('main'); ?>
    <div id="siswa">
        <h2>Tambah Siswa</h2>
            <?php echo Form::open(['url'=>'siswa', 'files'=> true]); ?>

            <?php echo $__env->make('siswa.form', ['$submitButtonText'=>'Simpan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo Form::close(); ?>

    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba1\resources\views/siswa/create.blade.php ENDPATH**/ ?>