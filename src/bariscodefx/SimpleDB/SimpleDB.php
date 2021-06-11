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
        }catch(\PDOException $e)
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
        $query = parent::prepare("SELECT $column FROM $from $params");
        $exec = $query->execute($given);
        if( $exec ) {
            if( !empty( $type ) )
                return $query->fetch( $type );
            else
                return $query->fetch(  );
        }else
            throw new \Exception("Failed to get()");
    }
    
    /**
     * getAll function
     * returns an (array, object or like your parameter type) type value from database table
     */
    public function getAll($column = "*", $from, $params = "", $given = [], $type="")
    {
        $query = parent::prepare("SELECT $column FROM $from $params");
        $exec = $query->execute($given);
        if( $exec )
        {
            if( !empty( $type ) )
                return $query->fetchAll( $type );
            else
                return $query->fetchAll(  );
        }else
            throw new \Exception("Failed to getAll()");
    }
    
}