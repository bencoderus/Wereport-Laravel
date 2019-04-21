<?php $__env->startSection('title'); ?>
Dashboard - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <?php if(count($notify) > 0): ?>
                <div class="shadow-sm p-3 mb-5 bg-white rounded"><i class='fa text-info fa-bell'></i> <a href='notifications' class='text-dark'>You have a new notification.</a></div>
<?php endif; ?>

            <div class="card">
                <div class="card-header bg-primary">My Messages</div>

                <div class="card-body">
                    <?php if(count($msgs) > 0): ?>
                            <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="pull-left"><a href="/message/<?php echo e($msg->id); ?>"><i class='fa fa-envelope'></i> <?php echo e($msg->title); ?></a></div>
                            <div class="pull-right"><?php echo e($msg->created_at->diffForHumans()); ?></div>
                            <br><hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($msgs->links()); ?>

                            <?php else: ?>
                    <p>NO MESSAGE HAS BEEN SENT BY YOU</p>
                    <p class='text-center'><a href="message/create"><button class="btn btn-success"><i class="fa fa-envelope"></i> SEND US A MESSAGE</button></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>