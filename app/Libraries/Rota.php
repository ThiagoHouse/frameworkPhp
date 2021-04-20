<?php

class Rota {

    private $controlador = 'Paginas';

    public function __construct()
    {
        $url = $this->url() ? $this->url() : [0];
        
        if (file_exists('../app/Controllers/'.ucwords($url[0]).'.php')):
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        endif;

        require_once '../app/Controllers/'.$this->controlador.'.php';
        $this->controlador = new $this->controlador;

        var_dump($this);     
    }
    private function url()
    {
        $url = filter_input(INPUT_GET,'url', FILTER_SANITIZE_URL);
        if (isset($url)):
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);
            return $url;
        endif;
    }
}