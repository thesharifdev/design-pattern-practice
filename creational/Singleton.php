<?php

/**
 * The Singleton patttern is a pattern that restricts the instansiation of a class to single object and ensures that only one 
 * instance of the class exists throughout the aplication. In PHP, the singleton pattern can be implemented by defining a private
 * constructor, a static method to create the instance, and a static variable to hold the instance
 * 
 */

 class Singleton {

    private static $instance;

    private function __construct()
    {
        echo "New instance \n";
    }

    public static function getInstance()
    {
        if( !isset(self::$instance) ){
            self::$instance = new self();
        }else{
            echo "Old instance returned \n";
        }

        return self::$instance;
    }

    public function doSomething()
    {
        return "Hello from singleton class";
    }
 }

 Singleton::getInstance();
 Singleton::getInstance();
 Singleton::getInstance();
 Singleton::getInstance();


/**
 * Singleton pattern with constructor parameter
 */

 class Singleton2 {

    private static $instance = [];
    private $name;

    private function __construct()
    {
        //prevent direct instantiation of the class
    }

    public static function getInstance( $name ) 
    {
        if( !isset(self::$instance[$name])){
            self::$instance[$name] = new self($name);
        }

        return self::$instance[$name];
    }
 }
