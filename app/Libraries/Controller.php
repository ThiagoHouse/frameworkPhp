<?php
class Controller 
{
    public function model($model)
    {
        require_once '../aoo/Models/'.$model.'.php';
        return new $model;
    }
    
    public function view($view, $dados = [])
    {
        $arquivo = ('../app/Views/'.$view.'.php');
        if(file_exists($arquivo)):
            require_once $arquivo;
        else: 
            die('o arquivo de view não existe!');
        endif;
    }
}