<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header bg-primary">
Latest Replies
    </div>
    <div class="card-body">
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="pull-left"><?php echo e($com->message); ?></div> <div class="pull-right"><a href='/message/<?php echo e($com->msgid); ?>' class='btn btn-sm btn-primary'>View Thread</a></div><br><hr>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(count($comments) > 0): ?>

<?php else: ?>

<h4>NO COMMENT YET HAS BEEN ADDED TO ANY THREAD YET</h4>
<?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>