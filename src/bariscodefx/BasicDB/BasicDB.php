<?php

namespace bariscodefx\BasicDB;

/**
* Class BasicDB
*/
class BasicDB extends \PDO {
    
    /**
    * Constructor of Class
    * Base of Connection
    */
    public function __construct($host, $dbname, $username, $password, $charset = "utf-8"){
        try{
            parent::__construct("mysql:host=". $host .";dbname=". $dbname .";charset=". $charset . "\", $username, $password);
        }catch(PDOException $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
}
