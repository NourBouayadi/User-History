<?php $__env->startSection('content'); ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(count($errors)): ?>
                    <div id="my_errors_flash" class="alert alert-danger">
                        
                        <br/>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>  <?php echo app('translator')->getFromJson($error); ?>  </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(url('etudiants')); ?>" method="post" role="form" data-toggle="validator" data-disable="true">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input name="nom" class="form-control" placeholder="Nom" pattern="[a-zA-Z]+" maxlength="15" required data-error="Max length is 30"/>
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" class="form-control"placeholder="Prenom" pattern="[a-zA-Z]+" maxlength="30" required data-error="Max length is 30"required/>
                    </div>


                    <div class="form-group">
                        <label for="">Date de Naissance</label>
                        <input type="date" name="dtn" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="">Lieu de Naissance</label>
                        <input type="text" name="lieun" class="form-control" pattern="[a-zA-Z]+" maxlength="20"required data-error="alphabetic"/>
                    </div>


                    <input type="submit" value="Enregister" class="form-control btn btn-primary"/>

                </form>


            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>

    <script>
        $('.my_errors_flash').delay(500).fadeIn(250).delay(10000).fadeOut(500);
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>