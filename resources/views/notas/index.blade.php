@extends('layouts.app')

@section('titulo')
Listar Notas
@endsection

@section('content')

    <div class="col-md-12">
      <a href="{{ route('notas.create') }}" class="btn btn-success" style="margin-bottom:10px;">Adicionar Nota</a>

      <table class="table table-striped">
        
        <tbody>
        <thead>
            <tr>
              <th>Id</th>
              <th>Aluno</th>
              <th>Disciplina</th>
              <th>Nota</th>
              <th>Ações</th>
            </tr>
          </thead>
          @forelse ($notas as $nota)
          
            <tr>
              <td>{{ $nota->id }}</td>   
              <td>{{ $nota->aluno->nome }}</td>
              <td>{{ $nota->disciplina->disciplina }}</td>
              <td>{{ $nota->nota }}</td>
              
              <td>
                  <a class="btn btn-success"  href="{{ route('notas.edit', $nota->id) }}"><i class="fa fa-pencil"></i></a>

                  <form style="display: inline" action="{{ route('notas.destroy', $nota->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('Tem certeza que deseja remover a nota?')"><i class="fa fa-trash"></i></button>
                  </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="10">Nenhuma nota cadastrada</td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="text-center">
          {{ $notas->links() }}
      </div>
     
    </div>
@endsection