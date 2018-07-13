<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Matrícula</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matrícula" value="{{ old('matricula', @$aluno->matricula) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Nome</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{ old('nome', @$aluno->nome) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Endereço</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="{{ old('endereco', @$aluno->endereco) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Bairro</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{ old('bairro', @$aluno->bairro) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Cep</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep" value="{{ old('cep', @$aluno->cep) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">Cidade</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{ old('cidade', @$aluno->cidade) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">UF</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="{{ old('uf', @$aluno->uf) }}">
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-sm-12 control-label">E-mail</label>
    <div class="col-sm-12">
        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email', @$aluno->email) }}">
    </div>
</div>


<div class="form-group">
    <div class="col-sm-12">
    <button type="submit" class="btn btn-default">Salvar</button>
    </div>
</div>
