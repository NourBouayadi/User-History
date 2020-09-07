<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/datatable.min.css')); ?>" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h1>Activity Log </h1>

                <br>
                <table class="table table-bordered" >
                    <head>
                        <tr>
                            <th scope="row">Num</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Student Name</th>
                            <th>Date and Time</th>
                        </tr>
                    </head>
                    <body>
                    <?php $__currentLoopData = $activity_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activity_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <tr>
                            <td><?php echo e($key + $activity_logs->firstItem()); ?></td>
                            <td><?php echo e($activity_log->description); ?></td>
                            <td><?php echo e($activity_log->user->name); ?></td>
                            <?php if( empty($activity_log->etudiant->id )): ?>
                                <td>N/A</td>
                                <?php else: ?>
                               <td> <?php echo e($activity_log->etudiant->nom); ?></td>
                            <?php endif; ?>
                            <td><?php echo e($activity_log->created_at); ?></td>


                        </tr>

                        <?php ($key++); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </body>
                </table>
                <?php echo e($activity_logs->fragment('foo')->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>