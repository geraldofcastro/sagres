@extends('layouts.app')

@section('titulo')
Criar Aluno
@endsection

@section('content')
    <div class="col-md-12">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('disciplinas.store') }}">
            {{ csrf_field() }}

            @include('disciplinas.form')
          </form>

      <a href="{{ route('disciplinas.index') }}">Volta para a lista de disciplinas</a>
    </div>
@endsection
