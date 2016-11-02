<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

namespace App\Controller;
use App\Lib\Controller;
use App\Model\User;
use App\Lib\Auth;


Class LoginController extends Controller{
    
    
            
    function index(){
        
        if(Auth::isLogin())  $this->_redirect("/translator/");
    
        return Array(
            "/login/index", 
            Array(
               
                )
            ); 
    }
    
    
    function logout(){
        
         Auth::setLogin(Null, false);
         $this->_redirect("/translator/login");
    
       
    }
    
    
    function auth(){
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') $this->_redirect("/");
        if(Auth::isLogin())  $this->_redirect("/");
        $data = $this->_postParams(Array(
            'login' => "text",
            'password' => "password"
        ));
        
        $userModel = new User();
        $user = $userModel->getUserByLoginAndPassword($data['login'], $data['password']);
        
        if($user){
            Auth::setLogin($user, true);
            $this->_redirect("/");
        }
         
        $this->_redirect("/login/", "Login or password error!", "danger");
         exit; 
    }
    
  
}
