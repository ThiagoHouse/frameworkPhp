<div class="container my-5">
    <div class="card col-xl-8 col-md-6 mx-auto bg-light p-5 shadow ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->titulo ?></li>
            </ol>
        </nav>

        <div class="card text-center">
            <div class="card-header bg-secondary text-white font-weight-bold">
                <?= $dados['post']->titulo ?>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $dados['post']->texto ?></p>
            </div>
            <div class="card-footer text-muted">
                Escrito por: <?= $dados['usuario']->nome ?> em <?= Data::converteData($dados['post']->criado_em ) ?>
            </div>
            <?php if($dados['post']->usuario_id == $_SESSION['usuario_id']):?>
                <a href="<?= URL.'/posts/editar/'.$dados['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
            <?php endif ?>
        </div>
    </div>
</div>