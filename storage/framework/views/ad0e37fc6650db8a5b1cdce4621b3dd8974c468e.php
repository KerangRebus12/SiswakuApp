<?php $__env->startSection('main'); ?>
<div id="siswa">
    <h2>Detail Siswa</h2>
    <table class="table table-striped">
        <tr>
            <th class="table-primary">NISN</th>
            <td><?php echo e($siswa->nisn); ?></td>
        </tr>
        <tr>
            <th class="table-primary">Nama Siswa</th>
            <td><?php echo e($siswa->nama_siswa); ?></td>
        </tr>
        <tr>
            <th class="table-primary">Tanggal Lahir</th>
            <td><?php echo e($siswa->tanggal_lahir->format('d-m-Y')); ?></td>
        </tr>
        <tr>
            <th class="table-primary">Jenis Kelamin</th>
            <td><?php echo e($siswa->jenis_kelamin); ?></td>
        </tr>
        <tr>
            <th class="table-primary">Kelas</th>
            <td><?php echo e($siswa->kelas->nama_kelas); ?></td>
        </tr>
        <tr>
        <th class="table-primary">Nomor Telepon</th>
        <td><?php echo e(!empty($siswa->telepon->nomor_telepon)? $siswa->telepon->nomor_telepon : '-'); ?></td>
        </tr>
        <tr>
        <th class="table-primary">Hobi</th>
        <td>
        <?php $__currentLoopData = $siswa->hobi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span><?php echo e($item->nama_hobi); ?></span>,
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        </tr>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba1\resources\views/siswa/show.blade.php ENDPATH**/ ?>