@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar odontologo</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($odontologo, [ 'route' => ['odontologos.update',$odontologo->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre del odontologo') !!}
                            {!! Form::text('name',$odontologo->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('apellido', 'Apellidos del medico') !!}
                            {!! Form::text('apellido',$odontologo->apellido,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
