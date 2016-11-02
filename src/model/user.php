<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */


namespace Translator\Model;
use Translator\Lib\Model;

Class User extends Model{

    public $table = "translator_users";
    
    function getUserByLoginAndPassword($login, $password){
         $user = $this->getRow("AND login = '$login' AND password ='$password'");
         if(count($user)==0)             return false;
         return $user;
    }
    
}
