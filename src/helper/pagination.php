<?php
/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */


namespace App\Helper;

Class Pagination{
    
  
    public $count;
    public $elOnPage;
    public $start;
    public $url;
    public $params;
            
    function __construct($count, $url="", $elOnPage = 20, $params="") {
        
       
        $this->count = $count;
        $this->elOnPage = $elOnPage;
        $this->url = $url;
        $this->params = $params;
     }
    
    function render(){
        
        $start = 0;
        $curPage = 0; 
        if(isset($_GET['page'])){
            
            $curPage = abs(intval($_GET['page']));
            $start  = $curPage *$this->elOnPage;
            
        }
        
        
       
        
        $this->start = $start;
        $pages = ceil($this->count/$this->elOnPage);
        
        
       
        
        $startRenderPage = 0; 
        $endRenderPage = $pages; 
        
        $back = "";
        $next = "";
        
        if($pages>10){
          
            if($curPage-5>=0) {
                $startRenderPage =  $curPage-5;
                
            }
            
            if($curPage+5<$pages){ 
                $endRenderPage =  $curPage+5;
                if($endRenderPage<10 )   $endRenderPage =  $curPage+10;
            }
          
            
            
               
        }
        
        
        $result= 'Pages: '.($pages).'<br>'; 
        
        if($pages>1){
            $result .= '<ul class="pagination">';
            if($curPage!=0)  {
                $result.= '<li><a href="'.$this->url.'?page=0'.$this->params.'">First</a></li>';  
                $result.= '<li><a href="'.$this->url.'?page='.($curPage-1).$this->params.'">Prev</a></li>';
            }
            for($i=$startRenderPage; $i<$endRenderPage; $i++) {
                $class = "";
                if($i==$curPage)  $class = "class='active'";
                    $result.= '<li '.$class.'><a href="'.$this->url.'?page='.$i.$this->params.'">'.($i+1).'</a></li>';
             }
             if($curPage!=$pages-1) { 
                 $result.= '<li><a href="'.$this->url.'?page='.($curPage+1).$this->params.'">Next</a></li>'; 
                 $result.= '<li><a href="'.$this->url.'?page='.($pages-1).$this->params.'">Last</a></li>';  
             }
            $result.= '</ul> ';
        }
      
        
        return $result;
    }
    
}

