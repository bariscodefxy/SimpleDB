<?php

namespace SimpleDB;

use PDO;

/**
* Class SimpleDB
*/
class SimpleDB extends PDO {
    
    /** @var string $db_type */
    private string $db_type;
    
    /**
    * Constructor of Class
    * Base of Connection
    * 
    * @param string $db_type Database Type (ex: mysql, sqlite)
    */
    public function __construct(string $db_type){
        $this->db_type = $db_type;
    }
    
}