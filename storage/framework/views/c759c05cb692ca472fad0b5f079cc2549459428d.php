<?php $__env->startSection('content'); ?>


    <div class="container">

       <div class="row">
            <div class="col-md-10">
                <?php echo $__env->make('etudiant.search',['url'=>'etudiants','link'=>'etudiants'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                <h1>La liste des Etudiants</h1>
                <div class="pull-right">
                    <br><br><br>
                    <a href="<?php echo e(url('etudiants/create')); ?>" class="btn btn-success">Nouvel Etudiant</a>
                    <a href="<?php echo e(url('etudiants/pdfview/download')); ?>" class="btn btn-primary">Download PDF</a>
                    <a href="<?php echo e(url('etudiants/pdfview/view')); ?>" class="btn btn-secondary">view PDF</a>

                </div>
                <br>
                <?php if(session('success')): ?>
                    <div class="col-md-6 alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(url('etudiants/del')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                <table class="table table-bordered table-responsive ">
                    <head>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de Naissance</th>
                            <th>Lieu de Naissance</th>
                            <th>Date de Creation</th>
                            <th>Action</th>

                        </tr>
                    </head>
                    <body>
                    <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" name="delid[]" value="<?php echo e($etudiant->id); ?>"></td>
                            <td><?php echo e($etudiant->nom); ?></td>
                            <td><?php echo e($etudiant->prenom); ?></td>
                            <td><?php echo e($etudiant->dtn); ?></td>
                            <td><?php echo e($etudiant->lieun); ?></td>
                            <td><?php echo e($etudiant->created_at); ?></td>



                            <td>



                                <form action="<?php echo e(url('etudiants/'.$etudiant->id)); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    

                                    <a href="<?php echo e(url ('etudiants/'.$etudiant->id.'/edit')); ?>" class="btn btn-secondary">Editer</a>

                                </form>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </body>

                </table>


                <?php echo e($etudiants->fragment('foo')->links()); ?>


                <button type ="submit" class="btn btn-danger" onclick="return myFunction();">Supprimer</button>
                </form>

</div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script>
    function myFunction() {
        if(!confirm("Voulez-vous supprimer l'étudiant ?"))
            event.preventDefault();
    }
</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>