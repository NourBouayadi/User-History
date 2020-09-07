
<style>
        table td, table th{
    border:1px solid black;
	}
</style>
<div class="container">


	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>
		<tr>
			<th>Nom</th>
			<th>Prneom</th>
			<th>Date de Naissance</th>
            <th>Lieu de Naissance</th>
		</tr>
@foreach ($etudiants as $key => $etudiant)
    <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $etudiant->nom }}</td>
        <td>{{ $etudiant->prenom }}</td>
        <td>{{ $etudiant->dtn }}</td>
        <td>{{ $etudiant->lieun }}</td>
    </tr>
    @endforeach
    </table>
    </div>