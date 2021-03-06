@extends('layouts.app')

@section('titulo')
Criar Aluno
@endsection

@section('content')
    <div class="col-md-12">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('alunos.store') }}">
            {{ csrf_field() }}

            @include('alunos.form')
          </form>

      <a href="{{ route('alunos.index') }}">Volta para a lista de alunos</a>
    </div>
@endsection
