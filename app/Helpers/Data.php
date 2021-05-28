<?php 

/**
 * [Data] - Classe auxiliar responsável por formatar uma data padrão em uma data no formato brasileiro. 
 * @author Thiago Cruz
 */
class Data 
{
    public static function converteData($data)
    {
        return date('d/m/Y H:i', strtotime($data));
    }
}