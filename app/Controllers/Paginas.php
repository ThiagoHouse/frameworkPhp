<?php

class Paginas extends Controller{

    public function index(){
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
    
}