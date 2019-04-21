<?php $__env->startSection('content'); ?>

<h4 class='text-uppercase'>MODIFY: <?php echo e($msgs->title); ?></h4><hr>
<br>
<?php echo e(Form::open(['action'=>['MessageController@update', $msgs->id], 'method'=>'POST', 'enctype'=>'multipart/form-data'])); ?>

<div class='form-group'>
<?php echo e(Form::label('title', 'Subject: ')); ?>

<?php echo e(Form::text('title', $msgs->title, ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'3', 'class'=>'form-control'])); ?>

</div>


<div class='form-group'>
    <?php echo e(Form::label('body', 'Message: ')); ?>

    <?php echo e(Form::textarea('body', $msgs->message
    , ['placeholder'=>'Message', 'required'=>'required', 'minlength'=>'5', 'class'=>'form-control'])); ?>

    </div>


    <div class='form-group'>
        <?php echo e(Form::label('file', 'Attachment: ')); ?>

        <?php echo e(Form::file('image')); ?>

        </div>

    <?php echo e(Form::hidden('_method', 'PUT')); ?>

    <div class="form-group">
<?php echo e(Form::submit('Send Message', ['class'=>'btn btn-primary'])); ?>

    </div>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>