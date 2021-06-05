<?php
    var_dump($_FILES);

    echo '<hr>';

    if(isset($_FILES['arquivo'])):
        move_uploaded_file($_FILES['arquivo']['tmp_name'], '../public/uploads/'.$_FILES['arquivo']['name']);
    endif;

    echo '<hr>';


?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="enviar">
</form>

