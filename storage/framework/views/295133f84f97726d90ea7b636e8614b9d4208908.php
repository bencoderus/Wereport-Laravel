<?php $__env->startSection('content'); ?>
<?php if(empty($user->photo)): ?>

<?php else: ?>
<center>
<img src="/storage/usersphoto/<?php echo e($user->photo); ?>" style="width: 30%;" class="rounded-circle">
</center>
<?php endif; ?>
<h4>About <?php echo e($user->name); ?></h4><hr>
<p>Name: <?php echo e($user->name); ?></p><hr>
<p>Email: <?php echo e($user->email); ?></p><hr>
<p>Joined: <?php echo e($user->created_at->diffForHumans()); ?></p><hr>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>