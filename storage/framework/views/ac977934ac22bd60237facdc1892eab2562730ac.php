
<style>
        table td, table th{
    border:1px solid black;
	}
</style>
<div class="container">


	<br/>


	<table>
		<tr>
			<th>Nom</th>
			<th>Prneom</th>
			<th>Date de Naissance</th>
            <th>Lieu de Naissance</th>
		</tr>
<?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e(++$key); ?></td>
        <td><?php echo e($etudiant->nom); ?></td>
        <td><?php echo e($etudiant->prenom); ?></td>
        <td><?php echo e($etudiant->dtn); ?></td>
        <td><?php echo e($etudiant->lieun); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    </div>