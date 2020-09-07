@extends('layouts.app')
@section('content')
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/datatable.min.css')}}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h1>Activity Log </h1>

                <br>
                <table class="table table-bordered" >
                    <head>
                        <tr>
                            <th scope="row">Num</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Student Name</th>
                            <th>Date and Time</th>
                        </tr>
                    </head>
                    <body>
                    @foreach($activity_logs as $key => $activity_log)


                        <tr>
                            <td>{{ $key + $activity_logs->firstItem() }}</td>
                            <td>{{$activity_log->description}}</td>
                            <td>{{$activity_log->user->name}}</td>
                            @if( empty($activity_log->etudiant->id ))
                                <td>N/A</td>
                                @else
                               <td> {{$activity_log->etudiant->nom}}</td>
                            @endif
                            <td>{{$activity_log->created_at}}</td>


                        </tr>

                        @php($key++)
                    @endforeach

                    </body>
                </table>
                {{ $activity_logs->fragment('foo')->links() }}
            </div>
        </div>
    </div>
@endsection

