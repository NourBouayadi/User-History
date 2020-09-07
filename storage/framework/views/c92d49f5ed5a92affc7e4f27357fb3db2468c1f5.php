<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/rg-1.0.3/datatables.min.css"/>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>


</head>
<body>
<a href="<?php echo e(url('etudiants/create')); ?>" class="btn btn-success">Nouvel Etudiant</a>
<button id ="button" class="btn btn-danger">Supprimer</button><table id="example" class="display" style="width:100%">
    <table class="table table-bordered table-responsive ">
        <head>
            <tr>

                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de Naissance</th>
                <th>Lieu de Naissance</th>
                <th>Date de Creation</th>



            </tr>
        </head>
        <body>
        <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($etudiant->nom); ?></td>
                <td><?php echo e($etudiant->prenom); ?></td>
                <td><?php echo e($etudiant->dtn); ?></td>
                <td><?php echo e($etudiant->lieun); ?></td>
                <td><?php echo e($etudiant->created_at); ?></td>



                <td>



                    <form action="<?php echo e(url('etudiants/'.$etudiant->id)); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('DELETE')); ?>

                        <a href="" class="btn btn-primary">Details</a>
                        <a href="<?php echo e(url ('etudiants/'.$etudiant->id.'/edit')); ?>" class="btn btn-default">Editer</a>
                        <button type="submit" class="btn btn-danger">Suprmier</button>
                    </form>


                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </body>

    </table>
</table>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/rg-1.0.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo e(asset('assets/js/select.js')); ?>"></script>

</body>
</html>