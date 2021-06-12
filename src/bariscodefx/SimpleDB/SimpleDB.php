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
    public function get($table = "*", $from, $params = "", $given = [], $type = "")
    {
        $query = parent::prepare("SELECT $table FROM $from $params");
        $exec = $query->execute($given);
        if( $exec ) {
            if( !empty( $type ) )
                return $query->fetch( $type );
            else
                return $query->fetch(  );
        }else
            return false;
    }
    
    /**
     * getAll function
     * returns an (array, object or like your parameter type) type value from database table
     */
    public function getAll($table = "*", $from, $params = "", $given = [], $type="")
    {
        $query = parent::prepare("SELECT $table FROM $from $params");
        $exec = $query->execute($given);
        if( $exec )
        {
            if( !empty( $type ) )
                return $query->fetchAll( $type );
            else
                return $query->fetchAll(  );
        }else
            return false;
    }
    
    /**
     * returns true or false
     * sets a variable
     */
    public function set($table = "", $which = "", $where = "", $given = [])
    {
        $query = parent::prepare("UPDATE $table FROM SET $which WHERE $where");
        $exec = $query->execute($given);
        if( $exec )
        {
            return true;
        }else
            return false;
    }
    
    /**
     * returns true or false
     * appends item to a table
     */
    public function append($table = "", $set = "", $given = [])
    {
        $query = parent::prepare("INSERT INTO $table SET $set");
        $exec = $query->execute($given);
        if( $exec )
        {
            return true;
        }else 
            return false;
    }
    
    /**
     * returns true or false
     * removes a value from table
     */
    public function remove($table = "", $where = "", $given = [])
    {
        $query = parent::prepare("DELETE FROM $table WHERE $where");
        $exec = $query->execute($given);
        if( $exec )
        {
            return true;
        }else 
            return false;
    }
    
}