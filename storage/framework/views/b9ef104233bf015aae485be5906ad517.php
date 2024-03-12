
<?php $__env->startSection('body'); ?>
<div class="row">
    <div class="col-md-12">
        <?php if($user): ?>
        <h2><?php echo e($user['login']); ?></h2>
        <p>Follower count: <?php echo e($user['followers']); ?></p>
        <div id="followers-list" class="d-flex flex-wrap">
            <?php $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mx-2"><img src="<?php echo e($follower['avatar_url']); ?>" alt="<?php echo e($follower['login']); ?>" width="100"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button id="load-more" class="mt-4 btn-success">Load More</button>

        <?php endif; ?>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>

    $('#load-more').on('click', function(){
        let currentPage = 1;
        let username = $('h2').text();
        $.ajax({
                url: "followers/"+username,
                type: 'GET',
                data:'_token = <?php echo csrf_token() ?>',
                success: function(data) {
                    console.log(data);
                    data.forEach(follower => {
                        $('#followers-list').append(`<div><img src="${follower.avatar_url}" alt="${follower.login}" width="100"></div>`);
                        currentPage++;
                    });
                }
            });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-github-task\resources\views/github/index.blade.php ENDPATH**/ ?>