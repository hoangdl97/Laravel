<?php $__env->startSection('title', 'Task Status'); ?>
<?php $__env->startSection('management', 'Manager Task Status'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="<?php echo e(route('taskstatus.create')); ?>" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="<?php echo e(route('taskstatus.search')); ?>">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchName')); ?>" placeholder="Name" aria-label="Search" name="searchName"></th>
                    <th>
                        <button class="btn btn-navbar" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </th>
                </table>
            </div>
        </form>
    </div><br>
    <?php if(session('success')): ?>
        <div class="alert alert-warning alert-dismissible fade show w-25" role="alert">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-sm table-hover bg-light w-25">
        <br>
        <?php if(isset($task_statuses)): ?>
        <tr class="thead-dark">
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $task_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e($taskstatus->name); ?></td>
            <td class="d-flex justify-content-center">
                <a type="button" href="<?php echo e(route ('taskstatus.edit', $taskstatus->id)); ?>" class="btn btn-info d-flex">
                    <span class="fa fa-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="<?php echo e(route('taskstatus.destroy', $taskstatus->id)); ?>" method="POST" accept-charset="utf-">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-trash-alt mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="d-flex justify-content-end">
            <?php echo e($task_statuses->appends($_GET)->links()); ?>

       
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Desktop/blog/resources/views/taskstatuses/index.blade.php ENDPATH**/ ?>