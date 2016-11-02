<?php

/**
 * Gr8Dev gr8dev.com
 * @author Eugeny Nosenko info@gr8dev.com
 * @version 1.0
 */


namespace App\Lib;

Class Model{
    public $table = "";
    
    private $_db;

    public function __construct() {
        $this->_db = new DB();
    }
    
    public function getAll($start =0, $limit= 10, $where="", $cols = "*", $order="ORDER BY id ASC") {
         $query =  "SELECT  $cols  FROM  `".$this->table."`  WHERE 1 $where $order  LIMIT  $start, $limit"; 
         $rows =  $this->_db->get_results($query);
         if($rows) return $rows;
          return Array();
    }
    
    public function getById($id = 0 ) {
         $query =  "SELECT  *  FROM  `".$this->table."`  WHERE id='".$id."'"; 
         $row =  $this->_db->get_row($query, 1);
         if($row) return $row;
          return Array();
    }
    
     public function getRow($where ) {
         $query =  "SELECT  *  FROM  `".$this->table."`  WHERE 1 $where"; 
         $row =  $this->_db->get_row($query, 1);
         if($row) return $row;
          return Array();
    }
    
    public function getCount($where="") {
         $query =  "SELECT  *  FROM  `".$this->table."`  WHERE 1 $where"; 
      
         $rows =  $this->_db->num_rows($query);
         return $rows;  
    }
    
    public function insert($data) {
        return $this->_db->insert($this->table, $data);
    }
    
    public function update($data, $where = Array()) {
        return $this->_db->update($this->table, $data, $where);
    }
    
    public function delete($id) {
        return $this->_db->delete($this->table, Array('id'=>$id));
    }
}
