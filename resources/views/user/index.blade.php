@extends('layouts.app')
@section('content')
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/datatable.min.css')}}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>La liste des Users</h1>
                <div class="pull-right">
                    <a href="{{url('users/create')}}" class="btn btn-success">Nouvel User</a>
                </div>
                <br>
                <table class="table table-bordered table-responsive" id="example">
                    <head>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>

                            <th>Full Nmae</th>
                            <th>Last Login</th>
                        </tr>
                    </head>
                    <body>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>{{$user->full_name}}</td>
                            <td>{{$user->last_login}}</td>
                            <td>
                                <form action="{{url('users/'.$user->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{--  {{method_field('DELETE')}}--}}
                                    <a href="" class="btn btn-primary">Details</a>
                                    <a href="{{url ('users/'.$user->id.'/edit')}}" class="btn btn-default">Editer</a>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <script type="text/javascript" src="{{asset('assets/js/select.js')}}"></script>
                    </body>
                </table>

            </div>
        </div>
    </div>
@endsection

