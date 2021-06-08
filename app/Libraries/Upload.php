<?php

class Upload {

    private $diretorio;
    private $arquivo;
    private $tamanho;

    public function __construct(string $diretorio = null)
    {
        $this->diretorio = $diretorio ?? 'uploads';

        if (!file_exists($this->diretorio) && !is_dir($this->diretorio)) :
            mkdir($this->diretorio, 0777);
        endif;
    }

    public function imagem(array $imagem, int $tamanho = null)
    {
        $this->arquivo = (array) $imagem;
        $this->tamanho = $tamanho ?? 1;
        
        $extensao = pathinfo($this->arquivo['name'], PATHINFO_EXTENSION);

        $extensoesValida = ['png', 'jpg'];
        $tiposValidos = ['image/jpeg', 'image/png'];


        if (!in_array($extensao, $extensoesValida)) :
            echo "A extensão não é permitida";
        elseif (!in_array($this->arquivo['type'], $tiposValidos)) :
            echo 'Tipo invalido';
        elseif ($this->arquivo['size'] > $this->tamanho * (1024 * 1024)) :
            echo 'Arquivo muito grande';
        else :
            echo 'Pode enviar';
        endif;
    }
}