<?php $__env->startSection('title'); ?>
Send us a message  - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h4>SEND US A MESSAGE</h4><hr>
<br>
<?php echo e(Form::open(['action'=>'MessageController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])); ?>

<div class='form-group'>
<?php echo e(Form::label('title', 'Subject: ')); ?>

<?php echo e(Form::text('title', '', ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'3', 'class'=>'form-control'])); ?>

</div>


<div class='form-group'>
    <?php echo e(Form::label('body', 'Message: ')); ?>

    <?php echo e(Form::textarea('body', '', ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'5', 'class'=>'form-control'])); ?>

    </div>


    <div class='form-group'>
        <?php echo e(Form::label('file', 'Attachment: ')); ?>

        <?php echo e(Form::file('image')); ?>

        </div>

    <div class="form-group text-center">
        <?php echo e(Form::button('<i class="fa fa-envelope"></i> Send Comment', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])); ?>

    </div>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>