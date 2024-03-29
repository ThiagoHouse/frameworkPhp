<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Cadastre-se
        </div>    
        <div class="card-body bg-light">
            <p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer 
            seu cadastro</small></p>

            <form name="cadastrar" method="POST" action="<?= URL ?>/usuarios/cadastrar" class="mt-4">
                <div class="form-group my-2">
                    <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                    
                    <input type="text" name="nome" id="nome" value="<?=$dados['nome']?>" 
                        class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= $dados['nome_erro'] ?>
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="email">E-mail: <sup class="text-danger">*</sup></label>

                    <input type="text" name="email" id="email" value="<?=$dados['email']?>"
                        class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?=$dados['email_erro']?>
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="senha">Senha: <sup class="text-danger">*</sup></label>

                    <input type="password" name="senha" id="senha" value="<?=$dados['senha']?>"
                        class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?=$dados['senha_erro']?>
                    </div>
                </div>
                <div class="form-group my-2">
                    <label for="confirma_senha">Confirmar senha: <sup class="text-danger">*</sup></label>

                    <input type="password" name="confirma_senha" id="confirma_senha" value="<?=$dados['confirma_senha']?>"
                        class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?=$dados['confirma_senha_erro']?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 pt-2">
                        <input type="submit" value="Cadastar" class="btn btn-info btn-block">
                    </div>
                    <div class="col-md-6">
                        <a href="<?=URL?>/usuarios/login">Você tem uma conta? Faça login</a>
                    </div>
                </div>
            </form>
        </div>    
    </div>
</div>