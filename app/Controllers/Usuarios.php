<?php

class Usuarios extends Controller
{
    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');   
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

            if(in_array("", $formulario)):

                if(empty($formulario['nome'])):
                    $dados['nome_erro'] = 'Preencha o campo nome';
                endif;                
                if(empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;                
                if(empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;
                if(empty($formulario['confirma_senha'])):
                    $dados['confirma_senha_erro'] = 'Confirme a senha';
                endif;
            else:

                if(Checa::checarNome($formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é inválido';

                elseif(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';

                elseif($this->usuarioModel->checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado já está cadastrado';

                elseif(strlen($formulario['senha'] < 6)):
                    $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracters';
                
                elseif($formulario['senha'] != $formulario['confirma_senha']):
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                else:
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if($this->usuarioModel->armazenar($dados)):
                        echo "Cadastro Realizado com Sucesso";
                    else:
                        die("Erro ao armazenar usuario no banco de dados");
                    endif;        
                    
                endif; 

            endif;      
        else:
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];

        endif;
        $this->view('usuarios/cadastar', $dados);
    }  

    public function login()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'email_erro' => '',
                'senha_erro' => '',
            ];

            if(in_array("", $formulario)):
              
                if(empty($formulario['email'])):
                    $dados['email_erro'] = 'Preencha o campo email';
                endif;                
                if(empty($formulario['senha'])):
                    $dados['senha_erro'] = 'Preencha o campo senha';
                endif;
            else:
                if(Checa::checarEmail($formulario['email'])):
                    $dados['email_erro'] = 'O e-mail informado é invalido';
                else:
                    $checarLogin = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);

                    if($checarLogin):
                        echo 'Usuário Logado, poder criar a sessão <hr>';
                    else:
                        echo 'Usuario ou senha inválidos<hr>';
                    endif;
                endif; 

            endif;      

            var_dump($formulario);
        else:
            $dados = [
                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => '',
            ];

        endif;

        $this->view('usuarios/login', $dados);
    }  
}

