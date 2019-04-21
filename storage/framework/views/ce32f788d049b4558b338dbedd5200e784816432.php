<?php $__env->startSection('content'); ?>

<?php $__env->startSection('title'); ?>
Notifications - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<div class="card">
    <div class="card-header bg-primary">
All Notification
    </div>
    <div class="card-body">
            <?php if(count($notifys) > 0): ?>
        <?php $__currentLoopData = $notifys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notify): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="pull-left"><?php echo e($notify->message); ?></div> <div class="pull-right"><?php echo e($notify->created_at->diffForHumans()); ?> - <a href='/message/<?php echo e($notify->msgid); ?>' class='btn btn-sm btn-primary'>View Message</a></div><br><hr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

<h4>NO NEW NOTIFICATION YET</h4>
<?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>