
<?php $__env->startSection('body'); ?>
    <h2 class="mt-5">Search GitHub followers</h2>
    <form action="<?php echo e(route('search')); ?>" method="post" class="mt-5">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="username" placeholder="Enter GitHub username" class="form-control" value="<?php echo e(old('username')); ?>">
                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-github-task\resources\views/user/index.blade.php ENDPATH**/ ?>