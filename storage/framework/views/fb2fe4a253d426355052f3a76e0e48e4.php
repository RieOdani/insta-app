
<div class="modal fade" id="hide-post-<?php echo e($post->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-eye-slash"></i> Hide Post
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to hide this post?</p>
                <div class="mt-3">
                    <img src="<?php echo e($post->image); ?>" alt="post id <?php echo e($post->id); ?>" class="image-lg">
                    <p class="mt-1 text-muted"><?php echo e($post->description); ?></p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="<?php echo e(route('admin.posts.hide', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="unhide-post-<?php echo e($post->id); ?>">
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h3 class="h5 modal-title text-success">
                    <i class="fa-solid fa-user-check"></i> Unhide Post
                </h3>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unhide this post?</p>
                <div class="mt-3">
                    <img src="<?php echo e($post->image); ?>" alt="post id <?php echo e($post->id); ?>" class="image-lg">
                    <p class="mt-1 text-secondary"><?php echo e($post->description); ?></p>
                </div>
            </div>
            <div class="modal-footer border-0">
                <form action="<?php echo e(route('admin.posts.unhide', $post->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\insta-app-pm\resources\views/admin/posts/modal/status.blade.php ENDPATH**/ ?>