<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 22/02/2017
 * Time: 17:40
 */
namespace home\enterprise\contactCliente;

use home\enterprise\Model;

class WebMail extends Model
{
    protected $name;
    protected $email;
    protected $mensagem;


    function __construct(string $name , string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

public static function getIdAttribute()
{
    return 'name';
}

public static function getClassName()
{
    return 'WebMail';

}
}

