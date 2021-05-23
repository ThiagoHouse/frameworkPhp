<?php

class Posts extends Controller
{
    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            Url::redirecionar('usuarios/login');
        endif;

        $this->postModel = $this->model('Post');   

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
                'usuario_id' => $_SESSION['usuario_id'],
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

                if($this->postModel->armazenar($dados)):
                    Sessao::mensagem('post', 'Post Cadastrado com Sucesso');
                    Url::redirecionar('posts');
                else:
                    die("Erro ao armazenar posts no banco de dados");
                endif;

            endif;      
        else:
            $dados = [
                'usuario_id' => '',
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