<?php

class Paginas extends Controller{

    public function index(){

        if (Sessao::estaLogado()) :
            Url::redirecionar('posts');
        endif;

        $dados = [
            'tituloPagina' => 'Pagina Inicial',
            'descricao' => 'FrameworkPhp'
        ];

        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {
        $dados = [
            'tituloPagina' => 'Pagina sobre nós',
            'descricao' => 'FrameworkPhp'
        ];
        
        $this->view('paginas/sobre', $dados);
    }

    public function error()
    {
        $dados = [
            'tituloPagina' => 'Erro - Página não encontrada'
        ];
        
        $this->view('paginas/error', $dados);
    }
    
}