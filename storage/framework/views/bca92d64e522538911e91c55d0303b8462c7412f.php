<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(url('users/'.$user->id)); ?>" method="post" >
                    <input type="hidden" name="_method" value="PUT">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo e($user->password); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="<?php echo e($user->full_name); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Last Login</label>
                        <input type="text" name="last_login" class="form-control" value="<?php echo e(auth()->user()->last_login); ?>">
                    </div>
                    <input type="submit" value="Modifier" class="form-control btn btn-danger">

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>