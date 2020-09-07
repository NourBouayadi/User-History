<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/datatable.min.css')); ?>" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>La liste des Users</h1>
                <div class="pull-right">
                    <a href="<?php echo e(url('users/create')); ?>" class="btn btn-success">Nouvel User</a>
                </div>
                <br>
                <table class="table table-bordered table-responsive" id="example">
                    <head>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>

                            <th>Full Nmae</th>
                            <th>Last Login</th>
                        </tr>
                    </head>
                    <body>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>

                            <td><?php echo e($user->full_name); ?></td>
                            <td><?php echo e($user->last_login); ?></td>
                            <td>
                                <form action="<?php echo e(url('users/'.$user->id)); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    
                                    <a href="" class="btn btn-primary">Details</a>
                                    <a href="<?php echo e(url ('users/'.$user->id.'/edit')); ?>" class="btn btn-default">Editer</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <script type="text/javascript" src="<?php echo e(asset('assets/js/select.js')); ?>"></script>
                    </body>
                </table>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>