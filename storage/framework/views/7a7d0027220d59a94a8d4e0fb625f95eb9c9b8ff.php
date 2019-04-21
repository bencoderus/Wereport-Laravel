<?php $__env->startSection('content'); ?>
<?php echo e(Form::open(['action'=>'CommentController@update', 'method'=>'POST'])); ?>

<center>
<?php echo e(Form::label('Comment', 'Modify Comment: ')); ?>

</center>
<div class="form-group">
<?php echo e(Form::textarea('comment', $comment->message, ['class'=>'form-control', 'rows'=>'5'])); ?>

</div>
<center>

<?php echo e(Form::hidden('msgid', $comment->msgid)); ?>

<?php echo e(Form::hidden('id', $comment->id)); ?>

<?php echo e(Form::button('<i class="fa fa-envelope"></i> Update changes!', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])); ?>

</center>
<?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>