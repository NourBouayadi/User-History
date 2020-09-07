@extends('layouts.app')
@section('content')


    <div class="container">

       <div class="row">
            <div class="col-md-10">
                @include('etudiant.search',['url'=>'etudiants','link'=>'etudiants'])


                <h1>La liste des Etudiants</h1>
                <div class="pull-right">
                    <br><br><br>
                    <a href="{{url('etudiants/create')}}" class="btn btn-success">Nouvel Etudiant</a>
                    <a href="{{ url('etudiants/pdfview/download') }}" class="btn btn-primary">Download PDF</a>
                    <a href="{{ url('etudiants/pdfview/view') }}" class="btn btn-secondary">view PDF</a>

                </div>
                <br>
                @if(session('success'))
                    <div class="col-md-6 alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <form action="{{ url('etudiants/del') }}" method="post">
                    {!! csrf_field() !!}
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
                    @foreach($etudiants as $etudiant)
                        <tr>
                            <td><input type="checkbox" name="delid[]" value="{{ $etudiant->id }}"></td>
                            <td>{{$etudiant->nom}}</td>
                            <td>{{$etudiant->prenom}}</td>
                            <td>{{$etudiant->dtn}}</td>
                            <td>{{$etudiant->lieun}}</td>
                            <td>{{$etudiant->created_at}}</td>



                            <td>



                                <form action="{{url('etudiants/'.$etudiant->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{--{{method_field('DELETE')}}--}}

                                    <a href="{{url ('etudiants/'.$etudiant->id.'/edit')}}" class="btn btn-secondary">Editer</a>

                                </form>


                            </td>
                        </tr>
                    @endforeach
                    </body>

                </table>


                {{ $etudiants->fragment('foo')->links() }}

                <button type ="submit" class="btn btn-danger" onclick="return myFunction();">Supprimer</button>
                </form>

</div>
        </div>
    </div>
@endsection
<script>
    function myFunction() {
        if(!confirm("Voulez-vous supprimer l'étudiant ?"))
            event.preventDefault();
    }
</script>