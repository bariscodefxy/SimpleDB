<?php

use PHPUnit\Framework\TestCase;
use bariscodefx\SimpleDB\SimpleDB;

class DatabaseConnectionTest extends TestCase {

    public function testConnect(){
        $db = new SimpleDB("localhost", "mysql", "root", "");
    }

}