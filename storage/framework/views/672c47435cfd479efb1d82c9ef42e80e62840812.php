<?php $__env->startSection('title', 'Task'); ?>
<?php $__env->startSection('management', 'Manager Task'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="<?php echo e(route('task.create')); ?>" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="<?php echo e(route('task.search')); ?>">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchTask')); ?>" placeholder="Task" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchProject')); ?>" placeholder="Project" aria-label="Search" name="searchProject"></th>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchStatus')); ?>" placeholder="Status" aria-label="Search" name="searchStatus"></th>
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
        <table class="table table-sm table-hover bg-light col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <br>
        <?php if(isset($tasks)): ?>
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Task</th>
            <th class="text-center">Infomation</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Data</th>
            <th class="text-center">Status</th>
            <th class="text-center">Project</th>
            <th class="text-center">Member</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e($task->id); ?></td>
            <td class="text-center"><?php echo e($task->name); ?></td>
            <td class="text-center"><?php echo e($task->description); ?></td>
            <td class="text-center"><?php echo e($task->start_date); ?></td>
            <td class="text-center"><?php echo e($task->end_date); ?></td>
            <td class="text-center"><?php echo e($task->taskStatus->name); ?></td>
            <td class="text-center"><?php echo e($task->project->name); ?></td>
            <td class="text-center"><?php echo e($task->member->name); ?></td>
            <td class="d-flex justify-content-center">
                <a type="button" href="<?php echo e(route ('task.edit', $task->id)); ?>" class="btn btn-info d-flex">
                    <span class="fa fa-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="<?php echo e(route('task.destroy', $task->id)); ?>" method="POST" accept-charset="utf-">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-trash-alt mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <div class="d-flex justify-content-end">
        <?php echo e($tasks->appends($_GET)->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Desktop/blog/resources/views/tasks/index.blade.php ENDPATH**/ ?>