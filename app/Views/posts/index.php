<div class="container py-5">
    <?= Sessao::mensagem('post') ?>
    <div class="card">
        <div class="card-header bg-info text-white">
            POSTAGENS
                <div class="float-end">
                    <a href="<?=URL?>/posts/cadastrar" class="btn btn-light">Escrever</a>
                </div>
        </div>
        <div class="card-body">
            <p>Listar posts aqui</p>
        </div>
    </div>

</div>