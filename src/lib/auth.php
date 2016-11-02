<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

namespace  App\Lib;

Class Auth{
    
    static function isLogin() {
        if(isset($_SESSION['login']) && $_SESSION['login']) return true;
        return false;
    }
    
    static function setLogin($user, $status) {
         $_SESSION['user'] = $user;
         $_SESSION['login'] = $status;
          return;
    }
}
