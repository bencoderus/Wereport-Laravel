<?php $__env->startSection('content'); ?>

<h5>Hello <?php echo e(Auth::user()->name); ?>, welcome to your account manager! </h5><hr>
<p class='text-center'>Ensure the quality of the image is good enough</p>

<?php echo e(Form::open(['action'=>'UserController@storephoto', 'method'=>'POST', 'enctype'=>'multipart/form-data'])); ?>

<div class="form-group text-center">
<?php echo e(Form::label('image', 'Choose Photo: ')); ?>

<?php echo e(Form::file('image')); ?>

</div>
<div class="text-center">
<?php echo e(Form::submit('Add New Photo', ['class'=>'btn btn-success'])); ?>

</div>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>