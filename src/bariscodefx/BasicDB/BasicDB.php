<?php

namespace bariscodefx\BasicDB;

class BasicDB extends \PDO {
    
    public function __construct($host, $dbname, $username, $password, $charset = "utf-8"){
        try{
            parent::__construct("mysql:host='". $host ."';dbname='". $dbname ."';charset='". $charset ."'", $username, $password);
        }catch(PDOException $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
}
