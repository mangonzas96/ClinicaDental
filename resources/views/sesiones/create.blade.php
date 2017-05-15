@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear sesion</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'sesiones.store']) !!}
                        <div class="form-group">
                            {!! Form::label('fecha_hora', 'Fecha y hora de la cita') !!}


                            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />


                        </div>

                        <div class="form-group">
                            {!!Form::label('odontologo_id', 'Odontologo') !!}
                            <br>
                            {!! Form::select('odontologo_id', $odontologos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!!Form::label('gabinete_id', 'Gabinete') !!}
                        <br>
                        {!! Form::select('gabinete_id', $gabinetes, ['class' => 'form-control']) !!}
                    </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection