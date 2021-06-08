<?php

if (isset($_FILES['arquivo'])) :

    include '../app/Libraries/Upload.php';
    $upload = new Upload();
    $upload->imagem($_FILES['arquivo'], null, 'produtos');
    if ($upload->getResultado()) :
        echo 'Upload realizado com sucesso ' . $upload->getResultado();
    else :
        echo $upload->getErro();
    endif;

    echo '<hr>';

    var_dump($upload);

endif;

?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="enviar">
</form>