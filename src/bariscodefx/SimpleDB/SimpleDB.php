<?php

namespace bariscodefx\SimpleDB;

/**
* Class SimpleDB
*/
class SimpleDB extends \PDO {
    
    /**
    * Constructor of Class
    * Base of Connection
    */
    public function __construct($host, $dbname, $username, $password, $charset = "utf8"){
        try{
            parent::__construct("mysql:host=". $host .";dbname=". $dbname .";charset=". $charset, $username, $password);
        }catch(PDOException $e)
        {
            echo $e->getMessage() . PHP_EOL;
        }
    }
    
    /**
    * get function
    * returns value from your database
    */
    public function get($column = "*", $from, $params = "", $given = [], $type = "")
    {
        $query = parent::prepare("SELECT $column FROM $params");
        $exec = $query->execute($given);
        if( $exec ) {
            if( !empty( $type ) )
                return $exec->fetch( $type );
            else
                return $exec->fetch(  );
        }else
            Throw new \Exception("Failed to get.");
    }
        
}
