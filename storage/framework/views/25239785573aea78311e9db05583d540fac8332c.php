<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(url('etudiants/'.$etudiant->id)); ?>" method="post" >
                    <input type="hidden" name="_method" value="PUT">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo e($etudiant->nom); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" class="form-control" value="<?php echo e($etudiant->prenom); ?>">
                    </div>


                    <div class="form-group">
                        <label for="">Date de Naissance</label>
                        <input type="date" name="dtn" class="form-control" value="<?php echo e($etudiant->dtn); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Lieu de Naissance</label>
                        <input type="text" name="lieun" class="form-control" value="<?php echo e($etudiant->lieun); ?>">
                    </div>


                    <input type="submit" value="Modifier" class="form-control btn btn-danger">

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>