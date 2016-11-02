<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

namespace App\Controller;
use App\Lib\Controller;

Class AdminController extends Controller{
    
  
            
     function index(){
       
        
        return Array(
            "/admin/index", 
            Array(
                "param"=>'ADMIN'
                )
            ); 
    }
    
    
}
