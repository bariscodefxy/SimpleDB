<?php

namespace bariscodefx\BasicDB;

class BasicDB extends \PDO {
    
    public function __construct($host, $dbname, $username, $password, $charset = "utf-8"){
        if(!$host)
        {
            Throw new \Exception("Host must be defined");
        }else if(!$dbname) {
            Throw new \Exception("Database must be defined");
        }else if(!$username) {
            Throw new \Exception("Username must be defined");
        }else if(!$password) {
            Throw new \Exception("Password must be defined");
        }
        
        try{
            parent::__construct("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
        }catch(PDOException $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
}
