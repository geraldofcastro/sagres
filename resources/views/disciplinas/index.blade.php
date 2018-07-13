@extends('layouts.app')

@section('titulo')
Listar Disciplinas
@endsection

@section('content')

    <div class="col-md-12">
      <a href="{{ route('disciplinas.create') }}" class="btn btn-success" style="margin-bottom:10px;">Adicionar Disciplina</a>
      <table class="table table-striped">
        <tbody>
          <thead>
              <tr>
                <th>Id</th>
                <th>Disciplina</th>
                <th>Ações</th>
              </tr>
          </thead>
          @forelse ($disciplinas as $disciplina)
          
            <tr>
              <td>{{ $disciplina->id }}</td>
              
              <td>{{ $disciplina->disciplina }}</td>
              <td>
                  <a class="btn btn-success"  href="{{ route('disciplinas.edit', $disciplina->id) }}"><i class="fa fa-pencil"></i></a>

                  <form style="display: inline" action="{{ route('disciplinas.destroy', $disciplina->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Tem certeza que deseja remover o disciplina?')"><i class="fa fa-trash"></i></button>
                  </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3">Nenhuma disciplina cadastrada</td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="text-center">
          {{ $disciplinas->links() }}
      </div>
    </div>
@endsection