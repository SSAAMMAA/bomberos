@extends('layouts.app')

@section('content')

<article class="col-md-12">
  <div class="panel panel-default">
    <div id="breadcrumb" class="panel-heading">
      <span class="fa fa-users" aria-hidden="true"></span>
      <h4>Presentes al Servicio N° {{$servicio}}</h4>
    </div>
    <div class="panel-body">

      {!! Form::open([ 'route' => 'servicio.editar_presentes', 'class' => 'form-horizontal', 'method' => 'PUT']) !!}

        {!! Form::hidden('servicio', $servicio) !!}

        <div class="form-group bomberosparticipantes">
          @foreach($bomberos as $ingresado)
            @php
              $asistselec=$ingresado->tipo_id;
            @endphp
            @include('asistencia.bombero')
          @endforeach
        </div>


        <div class="form-group">
          <div class="col-md-3 col-md-offset-6">
            <button type="submit" class="btn btn-primary">
                <i class="glyphicon glyphicon-bell"></i> Finalizar
            </button>
          </div>
        </div>

      {!! Form::close() !!}
    </div>
  </div>
</article>
@endsection

@section('js')
  {!! Html::script('assets/js/ajaxbombero.js') !!}
@endsection
