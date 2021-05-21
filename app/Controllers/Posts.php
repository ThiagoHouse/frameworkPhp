<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            Url::redirecionar('usuarios/login');
        endif;
    }

    public function index()
    {
        $this->view('posts/index');
    }
}