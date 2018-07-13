@extends('layouts.app')

@section('titulo')
Criar Nota
@endsection

@section('content')
    <div class="col-md-12">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('notas.update', $nota->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('notas.form')
          </form>

      <a href="{{ route('notas.index') }}">Volta para a lista de notas</a>
    </div>
@endsection