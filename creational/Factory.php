<?php

/**
 * Factory pattern is a design pattern that used to create object without exposing the creation
 * logic to the client and refering to the newly created object using a common interface. 
 */

 interface Animal 
 {
    public function makeSound();
 }

 class Dog implements Animal
 {
    public function makeSound()
    {
        return "Wof! \n";
    }
 }

 class Cat implements Animal
 {
    public function makeSound()
    {
        return "Mew! \n";
    }
 }

 class AnimalFactory
 {
    public static function createAnimal($type='cat'){
       
        return match($type){
            "cat"   => new Cat(),
            "dog"   => new Dog(),
            default => throw new Exception("This type not exits")
        };
    }
 }

echo AnimalFactory::createAnimal('dog')->makeSound();