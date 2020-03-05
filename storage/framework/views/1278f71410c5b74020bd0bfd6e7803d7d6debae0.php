<?php $__env->startSection('title', 'Members'); ?>
<?php $__env->startSection('management', 'Manager Members'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <a type="button" href="<?php echo e(route('member.create')); ?>" class="btn btn-success col-auto mr-auto">
        <span class="fa fa-user-plus mr-2"></span>Add
    </a>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <br>
    <div class="d-flex">
        <form class="form-inline" method="get" action="<?php echo e(route('member.search')); ?>">
            <div class="input-group input-group-sm">
                <table>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchName')); ?>" placeholder="Name" aria-label="Search" name="searchName"></th>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchEmail')); ?>" placeholder="Email" aria-label="Search" name="searchEmail"></th>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchPhone')); ?>" placeholder="Phone" aria-label="Search" name="searchPhone"></th>
                    <th><input class="form-control" type="text" value="<?php echo e(request()->input('searchUser')); ?>" placeholder="Username" aria-label="Search" name="searchUser"></th>
                    <th>
                        <select name="searchPosition" class="form-control col-auto <?php $__errorArgs = ['is_admin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('is_admin')); ?>" autocomplete="is_admin">
                            <option></option>
                        <?php $__currentLoopData = App\Models\Member::IS_ADMIN; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option placeholder="Position" value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </th>
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

    <table class="table table-sm table-hover bg-light">
        <br>
        <?php if(isset($members)): ?>
        <tr class="thead-dark">
            <th class="text-center">ID</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Username</th>
            <th class="text-center">Image</th>
            <th class="text-center">Position</th>
            <th class="text-center">Action</th>
        </tr>
        <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center"><?php echo e($member->id); ?></td>
            <td class="text-center"><?php echo e($member->name); ?></td>
            <td class="text-center"><?php echo e($member->email); ?></td>
            <td class="text-center"><?php echo e($member->phone); ?></td>
            <td class="text-center"><?php echo e($member->address); ?></td>
            <td class="text-center"><?php echo e($member->username); ?></td>
            <td class="text-center"><img class="w-25" src="<?php echo e(asset("storage/uploads/$member->image")); ?>"></td>
            <td class="text-center"><?php echo e($member->is_admin_label); ?></td>
            <td class="d-flex justify-content-center">
                <a type="button" href="<?php echo e(route ('member.edit', $member->id)); ?>" class="btn btn-info d-flex">
                    <span class="fa fa-user-edit mr-2 mt-1"></span>Edit
                </a>
                &nbsp;
                <form action="<?php echo e(route('member.destroy', $member->id)); ?>" method="POST" accept-charset="utf-">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger d-flex"><span class="fa fa-user-times mr-2 mt-1"></span>Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="d-flex justify-content-end">
            <?php echo e($members->appends($_GET)->links()); ?>

       
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Desktop/blog/resources/views/members/index.blade.php ENDPATH**/ ?>