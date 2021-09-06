<?php

namespace bariscodefx\SimpleDB;

use PDO;

/**
* Class SimpleDB
*/
class SimpleDB extends PDO {
    
    /**
    * Constructor of Class
    * Base of Connection
    */
    public function __construct($host, $dbname, $username, $password, $charset = "utf8"){
        try{
            parent::__construct("mysql:host=". $host .";dbname=". $dbname .";charset=". $charset, $username, $password);
        }catch(\PDOException $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
}