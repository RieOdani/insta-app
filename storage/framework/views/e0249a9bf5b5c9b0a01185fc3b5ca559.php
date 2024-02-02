
<div class="container p-0">
    <a href="<?php echo e(route('post.show', $post->id)); ?>">
        <img src="<?php echo e($post->image); ?>" alt="Post ID <?php echo e($post->id); ?>" class="w-100">
    </a>
</div>
<div class="card-body">
    
    <div class="row align-items-center">
        <div class="col-auto">
            <form action="#" method="post">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-sm shadow-none p-0"><i class="fa-regular fa-heart"></i></button>
            </form>
        </div>
        <div class="col-auto px-0">
            <span>3</span>
        </div>
        <div class="col text-end">
            <?php $__currentLoopData = $post->categoryPost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="badge bg-secondary bg-opacity-50">
                    <?php echo e($category_post->category->name); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <a href="#" class="text-decoration-none text-dark fw-bold"><?php echo e($post->user->name); ?></a>
    &nbsp;
    <p class="d-inline fw-light"><?php echo e($post->description); ?></p>
    
    <p class="text-uppercase text-muted xsmall"><?php echo e(date('M d, Y' , strtotime($post->created_at))); ?></p>


    
    
    

    
</div><?php /**PATH /home/rodz/Desktop/laravel-insta/laravel-insta-app-pm/sub_files/insta-app-pm/resources/views/users/posts/contents/body.blade.php ENDPATH**/ ?>