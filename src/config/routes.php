<?php
/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */

return
    Array(
         "/"=> Array("Admin", "index", Array("administrator")),
     
         "/login"=> Array("Login", "index"),
         "/auth"=> Array("Login", "auth"),
        "/logout"=> Array("Login", "logout",  Array("administrator")),
        
        
        
        
    );