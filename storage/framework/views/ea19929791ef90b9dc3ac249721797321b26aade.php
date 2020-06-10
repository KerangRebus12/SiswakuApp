<?php $__env->startSection('main'); ?>
    <div id="siswa">
        <h2>Siswa</h2>
        <?php if(!empty($siswa_list)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $siswa_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($siswa->nisn); ?></td>
                        <td><?php echo e($siswa->nama_siswa); ?></td>
                        <td><?php echo e($siswa->tanggal_lahir->format('d-m-Y')); ?></td>
                        <td><?php echo e($siswa->jenis_kelamin); ?></td>
                        <td><?php echo e($siswa->kelas->nama_kelas); ?></td>
                        <td><?php echo e(!empty($siswa->telepon->nomor_telepon)? $siswa->telepon->nomor_telepon : '-'); ?></td>
                        <td>
                        <div class="btn-group" role="group">
                        <a href="siswa/<?php echo e($siswa->id); ?>" class="btn btn-success btn-sm btn-icon icon-left">Detail</a>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="siswa/<?php echo e($siswa->id); ?>/edit" class="btn btn-warning btn-sm btn-icon icon-left">Edit</a>
                        </div>
                        <div class="btn-group" role="group">
                            <?php echo Form::model($siswa, ['method'=>'DELETE', 'action'=>['SiswaController@destroy', $siswa->id]]); ?>

                            <?php echo Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']); ?>

                            <?php echo Form::close(); ?>

                        </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p>Data Tidak Ditemukan</p>
            <?php endif; ?>
            <div class="table-bottom">
                <div>
                    <strong>Jumlah Siswa : <?php echo e($jumlah_siswa); ?></strong>
                </div>
                <div class="paging">
                    <?php echo e($siswa_list->links()); ?>

                </div>
            </div>
            <div class="bottom-nav">
                <div>
                    <a href="siswa/create" class="btn btn-primary">Tambah Siswa</a>
                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin/admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\coba1\resources\views/siswa/index.blade.php ENDPATH**/ ?>