@extends('layouts.app')

@section('titulo')
Visualizar Aluno
@endsection

@section('content')
      <div class="col-md-6">
        <p>Aluno:  {{ $aluno->nome }}</p>
        <p>Matrícula:  {{ $aluno->matricula }}</p>
        <p>Endereço:  {{ $aluno->endereco }}</p>
        <p>Bairro:  {{ $aluno->bairro }}</p>
        <p>Cep:  {{ $aluno->cep }}</p>
        <p>Cidade:  {{ $aluno->cidade }}</p>
        <p>UF:  {{ $aluno->uf }}</p>
        <p>E-mail:  {{ $aluno->email }}</p>
        <p>Data Entrada:  {{ $aluno->created_at }}</p>
      </div>
      <div class="col-md-6">
          <h1>Media das Notas</h1>
          @forelse ($notas as $nota)
            <p>{{ $nota->disciplina }}: {{ $nota->media }}</p>
          @empty
           Sem notas Cadastradas
          @endforelse
          
      </div>
@endsection