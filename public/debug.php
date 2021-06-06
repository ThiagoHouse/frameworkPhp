<?php

include '../app/Libraries/Upload.php'; 
$upload = new Upload('uploads5');

if (isset($_FILES['arquivo'])) :
    

endif;


// var_dump($_FILES);
// echo '<hr>';

// $nomeArquivo = 'arquivoTeste.txt';

// //deletando arquivo
// if (!file_exists('../public/uploads/'.$nomeArquivo)) :
//     unlink('../public/uploads/'.$nomeArquivo);
//     echo 'Arquivo deletado com sucesso';
// endif;


// if (isset($_FILES['arquivo'])) :
//     $diretorio = '../public/uploads/';
//     $arquivo = $_FILES['arquivo']['name'];
//     $tipo = $_FILES['arquivo']['type'];
//     $tamanhoArquivo = $_FILES['arquivo']['size'];

//     $extensoesValida = ['png', 'jpg'];
//     $tiposValidos = ['image/jpeg', 'image/png'];
//     $tamanhoValido = ['image/jpeg', 'image/png'];

//     $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);

//     if (!in_array($extensao, $extensoesValida)) :
//         echo "A extensão não é permitida";
//     elseif (!in_array($tipo, $tiposValidos)) :
//         echo 'Tipo invalido';
//     elseif ($tamanhoArquivo > 3 * (1024 * 1024)) :
//         echo 'Arquivo muito grande';
//     else :
//         if (!file_exists($diretorio) && !is_dir($diretorio)) :
//             mkdir($diretorio, 0777);
//         endif;

//         if (file_exists($diretorio . DIRECTORY_SEPARATOR . $arquivo)) :
//             $nome = pathinfo($arquivo, PATHINFO_FILENAME);
//             $arquivo = $nome . '-' . uniqid() . strrchr($arquivo, '.');
//         endif;

//         if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $arquivo)) :
//             echo 'Upload realizado com sucesso';
//         else :
//             echo 'Erro ao fazer upload';
//         endif;
//     endif;


// endif;

// echo '<hr>';


// ?>


// <form method="post" enctype="multipart/form-data">
//     <input type="file" name="arquivo">
//     <input type="submit" value="enviar">
// </form>