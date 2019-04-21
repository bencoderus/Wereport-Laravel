<?php $__env->startSection('title'); ?>
<?php echo e($msgs->title); ?> - <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h4 class="text-uppercase">    <?php echo e($msgs->title); ?></h4>

Sent: <?php echo e($msgs->created_at->diffForHumans()); ?><BR>
Message by: <b><?php echo e($msgs->user->name); ?></b>
<br>
Status:
<?php if($msgs->status >= 1): ?>
Seen
<?php else: ?>
Unread
<?php endif; ?>
<hr><br>
<center><img src='/storage/uploads/<?php echo e($msgs->image); ?>' style='width: 70%;' class=' img-thumbnail' align='center'></center><br>

<p class='text-justify'>
    <?php echo e(ucfirst($msgs->message)); ?>

</p>
<br>
<br>
<?php if(Auth::user()->name == $msgs->user->name || Auth::user()->level >=3): ?>

<a href='/message/<?php echo e($msgs->id); ?>/edit'><button class="btn-sm btn btn-primary"><i class='fa fa-edit'></i> Edit</button></a>
<?php echo e(Form::open(['action'=>['MessageController@destroy', $msgs->id], 'class'=>'pull-right', 'method'=>'POST'] )); ?>

<?php echo e(Form::hidden('_method', 'DELETE')); ?>

<?php echo e(Form::button('<i class="fa fa-trash"></i> Delete', ['type'=>'submit','class'=>'btn btn-sm btn-danger'] )); ?>

<?php echo e(Form::close()); ?>

<?php endif; ?>
<br>
<br>
<?php if(count($comment) > 0): ?>
<br><h5><i class='fa fa-comments-o'></i>
    <?php if(count($comment) > 1): ?>
    <?php echo e(count($comment)); ?> REPLIES
    <?php else: ?>
    <?php echo e(count($comment)); ?> REPLY
    <?php endif; ?>
</h5><br>
<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card">
<div class="card-header font-weight-bold"><span class="pull-left"><?php echo e($comment->user); ?></span><span class="pull-right"><?php echo e($comment->created_at->diffForHumans()); ?></span></div>
<div class="card-body">
    <?php echo e(ucfirst($comment->message)); ?>

    <br><br>
<?php if(Auth::user()->name == $comment->user || Auth::user()->level >=3): ?>
    <?php echo e(Form::open(['action'=>'CommentController@delete', 'class'=>'pull-left', 'method'=>'POST'])); ?>

<?php echo e(Form::hidden('id', $comment->id)); ?>

<?php echo e(Form::hidden('msgid', $msgs->id )); ?>

<?php echo e(Form::button('<i class="fa fa-trash"></i> Delete', ['type'=>'submit','class'=>'btn btn-sm btn-danger'] )); ?>


<?php echo e(Form::close()); ?>


<a href="/comment/edit/<?php echo e($comment->id); ?>" class="pull-right btn btn-sm btn-info"><i class="fa fa-edit"></i>Edit</a>
<?php endif; ?>
</div>

</div>

<br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<br>
<?php endif; ?>
<?php if(auth()->guard()->check()): ?>
<h5>LEAVE A COMMENT</h5>
<?php echo e(Form::open(['action'=>'CommentController@store', 'method'=>'POST'])); ?>

<div class="form-group">
<?php echo e(Form::textarea('comment', '', ['class'=>'form-control', 'placeholder'=>'Type Your Comment Here', 'rows'=>'5'])); ?>

</div>
<center>

        <?php echo e(Form::hidden('id', $msgs->id)); ?>

<?php echo e(Form::button('<i class="fa fa-envelope"></i> Send Comment', ['class'=>'btn btn-primary', 'required'=>'required', 'type'=>'submit'])); ?>

</center>
<?php echo e(Form::close()); ?>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>