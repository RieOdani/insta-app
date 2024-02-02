<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <a href="#">
                <?php if($post->user->avatar): ?>
                    <img src="#" alt="<?php echo e($post->user->name); ?>" class="rounded-circle avatar-sm">
                <?php else: ?>
                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                <?php endif; ?>
            </a>
        </div>
        <div class="col ps-0">
            <a href="#" class="text-decoration-none text-dark"><?php echo e($post->user->name); ?></a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>

                <?php if(Auth::user()->id === $post->user->id): ?>
                    <div class="dropdown-menu">
                        <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="dropdown-item">
                            <i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post-<?php echo e($post->id); ?>">
                            <i class="fa-regular fa-trash-can"></i> Delete
                        </button>
                    </div>
                    <?php echo $__env->make('users.posts.contents.modals.delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <div class="dropdown-menu">
                        <form action="#" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="dropdown-item text-danger">Unfollow</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/rodz/Desktop/laravel-insta/laravel-insta-app-pm/sub_files/insta-app-pm/resources/views/users/posts/contents/title.blade.php ENDPATH**/ ?>