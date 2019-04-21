<?php $__env->startSection('content'); ?>

<?php if(count($msgs) > 0): ?>
<ul class='list-group'>
<li class='list-group-item'><h6 class='mb-1'>All Messages</h6></li>

<?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class='list-group-item d-flex justify-content-between align-items-center'><a href='message/<?php echo e($msg->id); ?>'><h6 class='mb-1'><i class='fa fa-envelope'></i> <?php echo e($msg->title); ?></h6></a> - <?php echo e($msg->user->name); ?> </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>