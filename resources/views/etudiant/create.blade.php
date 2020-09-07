@extends('layouts.app')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>



    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count($errors))
                    <div id="my_errors_flash" class="alert alert-danger">
                        {{--<strong>Whoops!</strong>--}}
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>  @lang($error)  </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{url('etudiants')}}" method="post" role="form" data-toggle="validator" data-disable="true">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    {{csrf_field()}}

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
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script>
        $('.my_errors_flash').delay(500).fadeIn(250).delay(10000).fadeOut(500);
    </script>


@endsection