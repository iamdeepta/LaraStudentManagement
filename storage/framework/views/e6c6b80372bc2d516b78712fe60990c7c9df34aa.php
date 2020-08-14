<?php $__env->startSection('content'); ?>
<div class="card">
<div class="card-body">
<table class="table table-hover table-striped" style="width: 100%">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Education Level</th>
            <th>Points</th>
            <th>Images</th>
        </tr>

        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($student->name); ?></td>
            <td> <?php echo e($student->phone); ?></td>
            <td> <?php echo e($student->fname); ?></td>
            <td> <?php echo e($student->mname); ?></td>

            <?php $__currentLoopData = $student->degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $degree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($degree->degree_id == 1): ?>
            <td> <?php echo e('SSC'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 2): ?>
            <td> <?php echo e('HSC'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 3): ?>
            <td> <?php echo e('O LEVEL'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 4): ?>
            <td> <?php echo e('A LEVEL'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 5): ?>
            <td> <?php echo e('BSC'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 6): ?>
            <td> <?php echo e('BBA'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 7): ?>
            <td> <?php echo e('MSC'); ?></td>
            <?php endif; ?>
            <?php if($degree->degree_id == 8): ?>
            <td> <?php echo e('MBA'); ?></td>
            <?php endif; ?>

            <td> <?php echo e($degree->point); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $i=1; ?>
            <?php $__currentLoopData = $student->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($i>0): ?>
                    <td> <img src="<?php echo e(asset('images/students/'.$image->image)); ?>" style="width: 50px;height: 50px"></td>
                <?php endif; ?>
                <?php $i--; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>
</div>
</div>
<?php $__env->stopSection(); ?>
    
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentManagement\resources\views/index.blade.php ENDPATH**/ ?>