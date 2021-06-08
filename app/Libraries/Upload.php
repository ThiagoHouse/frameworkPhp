<?php

class Upload {

    private $diretorio;
    private $arquivo;
    private $tamanho;

    public function __construct($diretorio = null)
    {
        $this->diretorio = $diretorio ?? 'uploads';

        if (!file_exists($this->diretorio) && !is_dir($this->diretorio)) :
            mkdir($this->diretorio, 0777);
        endif;
    }

    public function imagem($imagem, $tamanho = null)
    {
        $this->arquivo = (array) $imagem;
        $this->tamanho = $tamanho ?? 1;
    }
}