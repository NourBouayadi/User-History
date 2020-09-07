
<style>

    table {
        border: 1px solid #ccc;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }



</style>
<div class="container">


    <br/>


    <table class="table table-bordered table-responsive ">
        <tr>
            <th scope="col">Num</th>
            <th scope="col">Nom</th>
            <th scope="col">Prneom</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Lieu de Naissance</th>
        </tr>
        <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td scope="row"><?php echo e(++$key); ?></td>
                <td scope="row"><?php echo e($etudiant->nom); ?></td>
                <td scope="row"><?php echo e($etudiant->prenom); ?></td>
                <td scope="row"><?php echo e($etudiant->dtn); ?></td>
                <td scope="row"><?php echo e($etudiant->lieun); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>