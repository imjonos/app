<?php
/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

namespace App;
use App\Lib\Auth;

Class App{
    
    private $_routes; 
    private $_controller;
    private $_action;
    private $_view;
    private $_layouts;
            
   function __construct() {
        
        $this->_routes = require_once  'src/config/routes.php';
        $this->_layouts = require_once  'src/config/layouts.php';
    }
    
    
    private function _doAction(){
        $routeArray = explode("?",$_SERVER['REQUEST_URI']);
        $route = $routeArray[0];
       
        if(isset($this->_routes[$route])){
            
                 
                 if(isset($this->_routes[$route]['2']) && count($this->_routes[$route]['1'])){
                    //simple check 
                     if(!Auth::isLogin()) {
                         //not login
                            header('Location: /translator/login');
                            exit;
                     }
                     
                 }
                
               
                    $this->_action = $action = $this->_routes[$route]['1'];
                    $this->_controller  =$this->_routes[$route]['0'];
                    $controllerClass =  "Translator\\Controller\\".$this->_routes[$route]['0']."Controller";
                  
                    $controller  = new $controllerClass;
                    //Do Action
                    $this->_view =  $controller->{$action}();
                 
        }
        else {
            //Not found action
            $this->_view = Array("/error/404", Array());
            $this->_controller = "error";
            //die();
        }
    }
    
    
    private function _renderView(){
        
        $params = $this->_view['1'];
        ob_start();
        require_once "view/".$this->_view['0'].".php";
        $content = ob_get_contents();
        ob_end_clean();
        if(isset($this->_layouts[$this->_controller])){
             require_once "view/layout/".$this->_layouts[$this->_controller].".php";
        }
        
        
    }
            
    function run(){
        $this->_doAction();
        $this->_renderView();
    }
    
}
 
