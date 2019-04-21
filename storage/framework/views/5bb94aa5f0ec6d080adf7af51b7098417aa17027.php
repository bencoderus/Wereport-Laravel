<?php $__env->startSection('title'); ?>
Messages - Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary">Unread Messages

    </div>
    <div class="card-body">

<?php if(count($msgs) > 0): ?>

<?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href='/message/<?php echo e($msg->id); ?>'><h6 class='mb-1'><i class='fa fa-envelope'></i><b> <?php echo e($msg->title); ?></b></h6></a> - <?php echo e($msg->user->name); ?>

<hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo e($msgs->links()); ?>

<?php else: ?>

    <h4 class='text-center'>NO NEW MESSAGE HAS BEEN RECIEVED YET</h4>


<?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>