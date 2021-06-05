<?php
    var_dump($_FILES);
    echo '<hr>';

    if(isset($_FILES['arquivo'])):
        $diretorio = '../public/uploads/';
        $arquivo = $_FILES['arquivo']['name'];

        if (!file_exists($diretorio) && !is_dir($diretorio)):
            mkdir($diretorio, 0777);
        endif;

        if (file_exists($diretorio.DIRECTORY_SEPARATOR.$arquivo)):
            $nome = pathinfo($arquivo, PATHINFO_FILENAME);
            $arquivo = $nome.'-'.uniqid().strrchr($arquivo, '.');
        endif;

        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$arquivo)):
            echo 'Upload realizado com sucesso';
        else:
            echo 'Erro ao fazer upload';
        endif;        
    endif;

    echo '<hr>';


?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="enviar">
</form>

