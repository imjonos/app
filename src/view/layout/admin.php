<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Translator Admin</title>

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Bootstrap -->
    <link href="/translator/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
     <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Translator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <?php 
              
              $active = Array(
                  "0" => "",
                  "1" => "",
                  "2" => "",
                  "3" => "",
                  
              );
              
              
              
              if(stristr($_SERVER['REQUEST_URI'], "/translator/translations")) $active['1'] =  "class='active'";
              else
              if(stristr($_SERVER['REQUEST_URI'], "/translator/languages")) $active['2'] =  "class='active'";
              else
              if(stristr($_SERVER['REQUEST_URI'], "/translator/import")) $active['3'] =  "class='active'";
              else
                  $active['0'] =  "class='active'";
              ?>
            <li <?php echo $active['0'];?>><a href="/translator/">Dictionary</a></li>
            <li <?php echo $active['1'];?>><a href="/translator/translations">Translations</a></li>
            <li <?php echo $active['2'];?>><a href="/translator/languages">Languages</a></li>
            <li <?php echo $active['3'];?>><a href="/translator/import">Import</a></li>
            
            
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <li><a href="/translator/logout">Logout</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      
      
      
      
    <?php
    $message = "";
    
    
    
    if(isset($_SESSION['message'])){?>
              <div class="alert alert-<?php echo $_SESSION['message']['type'];?>">
 <?php echo $_SESSION['message']['text'];?>
</div>    
      <?php
      unset($_SESSION['message']);
      
    }
    
    
    echo $content;
    ?>
        
        
        
    </div>
    
     <script> 
     $("body").on("click", "#deleteRow", function(){
         if (!confirm("Are you sure?")) {
                return false;
         }
     });
     </script>
     
  </body>
</html>
