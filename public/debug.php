<?php
    var_dump($_FILES);

    echo '<hr>';


?>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo">
    <input type="submit" value="enviar">
</form>

