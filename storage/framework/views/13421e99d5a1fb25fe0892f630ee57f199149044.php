<?php $__env->startSection('content'); ?>
<!--==========================
    Main Page Section
  ============================-->
  <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Password Reset')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                      <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                      </div>
                    <?php endif; ?>
                    <?php if(session('warning')): ?>
                      <div class="alert alert-warning">
                        <?php echo e(session('warning')); ?>

                      </div>
                    <?php endif; ?>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/entrepreneur/password/email')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right"><?php echo e(__('E-Mail Address')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Send Password Reset Link')); ?>

                                </button>                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('entrepreneur.layout.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>