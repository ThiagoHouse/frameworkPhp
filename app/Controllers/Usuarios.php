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

                if(!preg_match('/[a-zA-Z]+/m', $formulario['nome'])):
                    $dados['nome_erro'] = 'O nome informado é inválido';
                endif;
                
                if(strlen($formulario['senha'] < 6)):
                    $dados['senha_erro'] = 'A senha deve ter no mínimo 6 caracters';
                
                elseif($formulario['senha'] != $formulario['confirma_senha']):
                    $dados['confirma_senha_erro'] = 'As senhas são diferentes';
                else:
                    echo "pode cadastrar os dados<hr>";
                endif; 

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