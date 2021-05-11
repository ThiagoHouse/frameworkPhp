<div class="col-xl-4 col-md-6 mx-auto p-5">
<div class="card">
    <div class="card-body">
        <h2>Cadastre-se</h2>
        <small class="text-muted">Preencha o formulário abaixo para fazer seu cadastro</small>

        <form name="cadastrar" method="POST" action="<?=URL?>/usuarios/cadastrar">
            <div class="mb-3">
                <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                <input type="text" name="nome" id="nome" value="<?=$dados['nome']?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                <input type="email" name="email" id="email" value="<?=$dados['email']?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                <input type="password" name="senha" id="senha" value="<?=$dados['senha']?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="confirma_senha">Confirmar senha: <sup class="text-danger">*</sup></label>
                <input type="password" name="confirma_senha" id="confirma_senha" value="<?=$dados['confirma_senha']?>" class="form-control" required>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="Cadastar" class="btn btn-info btn-block">
                </div>
                <div class="col">
                    <a href="#">Você tem uma conta? Faça login</a>
                </div>
            </div>
        </form>

    </div>    
</div>
</div>