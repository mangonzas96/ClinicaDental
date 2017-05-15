@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sesion</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'sesiones.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear sesion', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Odontologo</th>
                                <th>Paciente</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($sesion as $cita)


                                <tr>
                                    <td>{{ $sesion->fecha_hora }}</td>
                                    <td>{{ $sesion->medico->full_name }}</td>
                                    <td>{{ $sesion->paciente->full_name}}</td>
                                    <td>{{ $sesion->gabinete->full_name}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['sesiones.edit',$sesion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['sesiones.destroy',$sesion->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection