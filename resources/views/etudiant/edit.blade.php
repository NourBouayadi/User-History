@extends('layouts.app')

@section('content')
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('etudiants/'.$etudiant->id)}}" method="post" >
                    <input type="hidden" name="_method" value="PUT">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}">
                    </div>

                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ $etudiant->prenom }}">
                    </div>


                    <div class="form-group">
                        <label for="">Date de Naissance</label>
                        <input type="date" name="dtn" class="form-control" value="{{ $etudiant->dtn }}">
                    </div>
                    <div class="form-group">
                        <label for="">Lieu de Naissance</label>
                        <input type="text" name="lieun" class="form-control" value="{{ $etudiant->lieun }}">
                    </div>


                    <input type="submit" value="Modifier" class="form-control btn btn-danger">

                </form>
            </div>
        </div>
    </div>
@endsection