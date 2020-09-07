@extends('layouts.app')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>




    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('users')}}" role="form" data-toggle="validator" data-disable="true" method="post">
                    <!--generer les tokens, pour les cles publiques pour passer les données-->
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control"placeholder="User Name"  maxlength="15" required data-error="Max length is 15">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"  placeholder="Email" data-error=" email address is invalid" required>
                    </div>


                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="pass1" data-minlength="6" class="form-control" placeholder="Password"required data-error="6 characters at least" oninput="verification();">
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="passwordConfirmed" id="pass2"data-minlength="6" class="form-control" placeholder="Password" required data-error="6 characters at least" oninput="verification();">
                    </div>
                    <div class="form-group">
                        <label id="label"></label>
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="full_name" class="form-control" pattern="^[A-Za-z -]+$" maxlength="15" required data-error="Max length is 30">
                    </div>

                    <div class="form-group">
                        <label for="">Last Login</label>
                        <input type="date" name="last_login" class="form-control">
                    </div>

                    <input type="submit" value="Enregister" id="valider" disabled class="form-control btn btn-primary">

                </form>
                <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
                <script src="{{asset('assets/js/jquery.js')}}"></script>

                <script>
                    function verification(){
                        if(document.getElementById('pass1').value==document.getElementById('pass2').value)
                        {document.getElementById('label').textContent="Password Confirmed! ";
                            document.getElementById('label').style.color="#41f4b5";
                            document.getElementById('pass1').style.borderColor="#41f4b5";
                            document.getElementById('pass2').style.borderColor="#41f4b5";
                            document.getElementById('valider').disabled=false;}
                        else
                        {document.getElementById('label').textContent="Password not confirmed!";
                            document.getElementById('label').style.color="#fca59f";
                            document.getElementById('pass1').style.borderColor="#fca59f";
                            document.getElementById('pass2').style.borderColor="#fca59f";
                            document.getElementById('valider').disabled=true;}
                    }
                </script>
            </div>
        </div>
    </div>
@endsection