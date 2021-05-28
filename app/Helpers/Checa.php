<?php 

class Checa 
{
    public static function checarNome($nome)
    {
        if (!preg_match('/[a-zA-Z]+/m', $nome)):
            return true;
        else: 
            return false;
        endif;
    }

    /**
     * Faz a validação de um email
     * @param string 
     * @return bool 
     */
    public static function checarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
            return true;
        else: 
            return false;
        endif;
    }
}