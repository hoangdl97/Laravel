<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="text-center">
        <h1><span class="fa fa-user-plus mr-2"></span>Add Task</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-sm-8 col-md-5 col-12 m-auto">
            <div class="panel panel-warning">
                <div class="panel-body">
                    <form action="<?php echo e(route('task.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Task :</label>
                            <div>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Infomation :</label>
                            <div>
                                <input id="description" type="text" class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" value="<?php echo e(old('description')); ?>" required autocomplete="description" autofocus>

                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Start Date :</label>
                            <div>
                                <input id="start_date" type="text" class="datepicker form-control <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="start_date" value="<?php echo e(old('start_date')); ?>" required autocomplete="start_date" autofocus>

                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>End Date :</label>
                            <div>
                                <input id="end_date" type="text" class="datepicker form-control <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="end_date" value="<?php echo e(old('end_date')); ?>" required autocomplete="end_date" autofocus>

                                <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Status :</label>
                                <select class="form-control" name="task_status_id">
                                <option value="empty" disabled selected>Choose status</option>
                                    <?php $__currentLoopData = $task_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($task_status->id); ?>" <?php echo e(($task_status->id == old('task_status')) ? 'selected': ''); ?>><?php echo e($task_status->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                        <div class="form-group">
                                <label>Project :</label>
                                <select name="project_id" class="form-control" id="project_id" >
                                <option value="empty" disabled selected>Choose project</option>
                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project->id); ?>" <?php echo e($project->id == old('project_id') ? 'selected' : ''); ?>><?php echo e($project->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                        <div class="form-group Member_id">
                                <label>Member :</label>
                                <select name="member_id" class="form-control" id="member" >
                                   
                                </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Accept</button> &nbsp;
                            <a href="<?php echo e(route('task.index')); ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $(".js-select2-multi").select2();
            $( ".datepicker" ).datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $("#project_id").change(function()
            {
                var project_id = $(this).val();
                var member_id = project_id;
                
                $.ajax({
                    type: "GET",
                    url: "project/"+member_id+"/select",
                    cache: false,
                    success: function(response)
                    {
                        $('#member').empty();
                        $.each(response['result']['members'], function (key, value) {
                            $("#member").append(
                                "<option value=" + value.id + ">" + value.name + "</option>"
                            );
                        });
                    } 
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/apple/Desktop/blog/resources/views/tasks/create.blade.php ENDPATH**/ ?>