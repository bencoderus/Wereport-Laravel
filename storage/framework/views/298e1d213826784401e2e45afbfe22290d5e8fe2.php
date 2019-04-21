<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header bg-primary">
All users
    </div>
    <div class="card-body">
            <?php if(count($users) > 0): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="pull-left"><?php echo e($user->name); ?></div> <div class="pull-right"><a href='/user/<?php echo e($user->id); ?>' class='btn btn-sm btn-primary'>View Profile</a></div><br><hr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

<h4>NO USERS YET</h4>
<?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>