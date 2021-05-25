<?php 

class Data 
{
    public static function converteData($data)
    {
        return date('d/m/Y H:i', strtotime($data));
    }
}