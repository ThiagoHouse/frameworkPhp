<div class="container py-5">
    <?= Sessao::mensagem('post') ?>
    <div class="card col-xl-8 col-md-8 mx-auto shadow ">
        <div class="card-header bg-info text-white">
            POSTAGENS
            <div class="float-end">
                <a href="<?= URL ?>/posts/cadastrar" class="btn btn-light">Escrever</a>
            </div>
        </div>
        <div class="card-body bg-light">
            <?php foreach ($dados['posts'] as $post) : ?>
                <div class="card my-5 shadow">
                    <div class="card-header bg-secondary text-white font-weight-bold">
                        <?= $post->titulo ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $post->texto ?></p>
                        <a href=" <?= URL. '/posts/ver/'.$post->postId ?>" 
                            class="btn btn-outline-primary float-end">Ler mais
                        </a>
                    </div>
                    <div class="card-footer text-muted">
                        Escrito por: <?= $post->nome ?> em <?= Data::converteData($post->postDataCadasro) ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</div>