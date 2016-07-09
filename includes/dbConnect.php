<?php

include('dbConfig.php');


class Database {
    
    private static $instance;
    private $dbconnection = null;
    
    function __construct() {
        
        $this->dbconnection = new mysqli($GLOBALS['dbHost'], $GLOBALS['dbUsername'], $GLOBALS['dbPassword'], $GLOBALS['dbDatabase']);
    }
    
    static function getInstance() {
        
        if(!self::$instance) {
           self::$instance = new self(); 
        }
        return self::$instance;
    }
    
    
    function sendFeedback($data) {
        
        $query = "INSERT INTO `feedback` (`data`) VALUES ('$data')";
        $result = self::$instance->dbconnection->query($query);
        return $this->dbconnection->insert_id;
    }
    
    private function __clone() { }
    
    function getFeedback() {
        
        $query = "SELECT * FROM `feedback` ORDER BY `id` ASC";
        $result = self::$instance->dbconnection->query($query);

        
        $data = array();
        
        
        if($result != false) {
            
            while($row = $result->fetch_assoc()) {
                
                array_push($data, $row);
            }
        }
        return $data;
    }
    

}





?>