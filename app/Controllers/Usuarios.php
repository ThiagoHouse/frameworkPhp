<?php

class Usuarios extends Controller
{
    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($formulario)):
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha']),
            ];

            if(empty($formulario['nome'])):
                $dados['nome_erro'] = 'Preencha o campo nome';
            endif;                
            if(empty($formulario['email'])):
                $dados['email_erro'] = 'Preencha o campo email';
            endif;                
            if(empty($formulario['senha'])):
                $dados['senha_erro'] = 'Preencha o campo senha';
            elseif(strlen($formulario['senha'] < 6)):
                    $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracters';
            endif;                
            if(empty($formulario['confirma_senha'])):
                $dados['confirma_senha_erro'] = 'Confirme a senha';
            else:
                if($formulario['senha'] != $formulario['confirma_senha']):
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                endif;    
            endif;
            
            if(! in_array("", $formulario)):
                echo 'Pode realizar o cadastro';
            endif;

            //var_dump($formulario);
        else:
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
            ];

        endif;
        $this->view('usuarios/cadastar', $dados);
    }
}