<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Disciplina</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="disciplina" name="disciplina" placeholder="Disciplina" value="{{ old('disciplina', @$disciplina->disciplina) }}">
    </div>
</div>


<div class="form-group">
    <div class="col-sm-12">
    <button type="submit" class="btn btn-default">Salvar</button>
    </div>
</div>
