<div class="form-group">
        <label for="disciplina_id" class="col-sm-2 control-label">Aluno</label>
        <div class="col-sm-10">
        <select type="text" class="form-control" id="aluno_id" name="aluno_id">
            <option value="">Selecione o Aluno</option>
    
            @foreach ($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{ @$nota->aluno_id == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group">
            <label for="disciplina_id" class="col-sm-2 control-label">Disciplina</label>
            <div class="col-sm-10">
            <select type="text" class="form-control" id="disciplina_id" name="disciplina_id">
                <option value="">Selecione a Disciplina</option>
        
                @foreach ($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}" {{ @$nota->disciplina_id == $disciplina->id ? 'selected' : '' }}>{{ $disciplina->disciplina }}</option>
                @endforeach
            </select>
            </div>
        </div>

<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Nota</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="nota" name="nota" placeholder="Nota" value="{{ old('nota', @$nota->nota) }}">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-12">
    <button type="submit" class="btn btn-default">Salvar</button>
    </div>
</div>
