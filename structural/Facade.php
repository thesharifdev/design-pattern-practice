<?php

/**
 * Facade design pattern is a structural design pattern that provides a simple interface to a complex system, 
 * making it easier to use and understand. It is used when a complex system has a large number of interdependent classes, 
 * and we want to provide a simplified interface for interacting with the system.
 */

 class UserDB 
 {

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function requiredCheck()
    {
        echo  "All required data ok for {$this->data}\n";
    }

    public function sanitizeData ()
    {
        echo "{$this->data} sanitized \n";
    }

    public function insertData()
    {
        echo "{$this->data} has been inserted";
    }
 }

 class UserDBFacade
 {

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function saveData()
    {
        $user_db = new UserDB( $this->data );
        $user_db->requiredCheck();
        $user_db->sanitizeData();
        $user_db->insertData();
    }
 }

 $facade = new UserDBFacade('something');
 $facade->saveData();
