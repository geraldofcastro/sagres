@extends('layouts.app')

@section('titulo')
Listar Alunos
@endsection

@section('content')

    <div class="col-md-12">
      <a href="{{ route('alunos.create') }}" class="btn btn-success" style="margin-bottom:10px;">Adicionar Aluno</a>
      <table class="table table-striped">     
        <tbody>
        <thead>
            <tr>
              <th>Id</th>
              <th>Matrícula</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
          </thead>
          @forelse ($alunos as $aluno)
          
            <tr>
              <td>{{ $aluno->id }}</td>
              <td>
                <a href="{{ route('alunos.show', $aluno->id) }}">
                  {{ $aluno->matricula }}
                </a>
              </td>
              
              <td>{{ $aluno->nome }}</td>
              <td>{{ $aluno->email }}</td>
              <td>
                  <a class="btn btn-success"  href="{{ route('alunos.edit', $aluno->id) }}"><i class="fa fa-pencil"></i></a>

                  <form style="display: inline" action="{{ route('alunos.destroy', $aluno->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Tem certeza que deseja remover o aluno?')"><i class="fa fa-trash"></i></button>
                  </form>

                  <a class="btn btn-primary"  href="{{ route('alunos.show', $aluno->id) }}"><i class="fa fa-eye"></i> Medias</a>
              </td>
            </tr>
          @empty
            <tr><td colspan="10">Nenhum aluno cadastrado</td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="text-center">
          {{ $alunos->links() }}
      </div>
    </div>
@endsection