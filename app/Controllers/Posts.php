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

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'titulo_erro' => '',
                'texto_erro' => '',
            ];

            if(in_array("", $formulario)):

                if(empty($formulario['titulo'])):
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                endif;

                if(empty($formulario['texto'])):
                    $dados['texto_erro'] = 'Preencha o campo texto';
                endif;
            else:

                echo 'pode cadastrar o post';

            endif;      
        else:
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];

        endif;

        var_dump($formulario);

        $this->view('posts/cadastrar', $dados);
    }  
}