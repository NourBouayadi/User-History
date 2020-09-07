
<style>

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
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
        @foreach ($etudiants as $key => $etudiant)
            <tr>
                <td scope="row">{{ ++$key }}</td>
                <td scope="row">{{ $etudiant->nom }}</td>
                <td scope="row">{{ $etudiant->prenom }}</td>
                <td scope="row">{{ $etudiant->dtn }}</td>
                <td scope="row">{{ $etudiant->lieun }}</td>
            </tr>
        @endforeach
    </table>
</div>
