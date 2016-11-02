<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

namespace  App\Lib;

Class Controller{
    
    protected function _redirect($url, $message="", $type = "success"){
        
        if($message){
            $_SESSION['message'] = Array(
                "text" => $message,
                "type" => $type
            );
        }
        
        header('Location: '.$url);
        exit;
    }


    protected function  _validateText($text){
         return preg_replace ("/[^a-zA-ZА-Яа-я0-9()\s]/u","",$text);
    }
    
    protected function  _hashPassword($text){
         return md5(md5($text));
    }
    
    protected function _postParams($array=Array()){
         return $this->_filterParams($array, $_POST);
    }

    protected function _getParams($array=Array()){
         return $this->_filterParams($array, $_GET);
    }
    
    private function _filterParams($array=Array(), $params) {
        $result = Array();
        
        foreach ($array as $key => $value) {
             $result[$key] = "";
             if(isset($params[$key])){
                 if($value == "text") $result[$key]  = $this->_validateText ($params[$key]);
                 else
                     if($value == "password") $result[$key]  = $this->_hashPassword($params[$key]);
                 else
                     if($value == "int") $result[$key]  = intval($params[$key]);
                 else
                     $result[$key]  = $params[$key];
                     
                 
             } 
        }
        
        return $result;
    }
}
