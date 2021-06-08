<?php

class Upload
{

    private $diretorio;
    private $arquivo;
    private $tamanho;
    private $nome;
    private $pasta;

    private $resultado;
    private $erro;

    public function getResultado(): string
    {
        return $this->resultado;
    }

    public function getErro(): string
    {
        return $this->erro;
    }

    public function __construct(string $diretorio = null)
    {
        $this->diretorio = $diretorio ?? 'uploads';

        if (!file_exists($this->diretorio) && !is_dir($this->diretorio)) :
            mkdir($this->diretorio, 0777);
        endif;
    }

    public function imagem(array $imagem, string $nome = null, string $pasta = null, int $tamanho = null)
    {
        $this->arquivo = (array) $imagem;
        $this->nome = $nome ?? pathinfo($this->arquivo['nome'], PATHINFO_FILENAME);
        $this->pasta = $pasta ?? 'imagens';
        $this->tamanho = $tamanho ?? 1;

        $extensao = pathinfo($this->arquivo['name'], PATHINFO_FILENAME);

        $extensoesValida = ['png', 'jpg'];
        $tiposValidos = ['image/jpeg', 'image/png'];

        if (!in_array($extensao, $extensoesValida)) :
            $this->erro = "A extensão não é permitida";
            $this->resultado = false;
        elseif (!in_array($this->arquivo['type'], $tiposValidos)) :
            $this->erro = 'Tipo invalido';
            $this->resultado = false;
        elseif ($this->arquivo['size'] > $this->tamanho * (1024 * 1024)) :
            $this->erro = 'Arquivo muito grande';
            $this->resultado = false;
        else :
            $this->criarPasta();
            $this->renomearArquivo();
            $this->moverArquivo();
        endif;
    }

    private function renomearArquivo()
    {
        $arquivo = $this->nome . strchr($this->arquivo['name'], '.');
        if (file_exists($this->diretorio . ($this->diretorio) . DIRECTORY_SEPARATOR . $this->pasta . DIRECTORY_SEPARATOR . $arquivo)) :
            $arquivo = $this->nome . '-' . uniqid() . strchr($this->arquivo['name'], '.');
        endif;

        $this->nome = $arquivo;
    }

    private function criarPasta()
    {
        if (!file_exists($this->diretorio) . DIRECTORY_SEPARATOR . $this->pasta && !is_dir($this->diretorio) . DIRECTORY_SEPARATOR . $this->pasta) :
            mkdir(($this->diretorio) . ($this->diretorio) . DIRECTORY_SEPARATOR . $this->pasta . DIRECTORY_SEPARATOR . $this->pasta, 0777);
        endif;
    }

    private function moverArquivo()
    {
        if (move_uploaded_file($this->arquivo['tmp_name'], $this->diretorio . DIRECTORY_SEPARATOR . $this->nome)) :
            $this->resultado = $this->nome;
        else :
            $this->resultado = false;
            $this->erro = "Erro ao mover arquivo";
        endif;
    }
}
