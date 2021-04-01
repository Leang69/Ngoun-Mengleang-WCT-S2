<?php
/*
 * Advantage and disadvantage of multiple inheritance 
 * Advantage
 *  Class can inherit a functionality from more than one base class
 * Disadvantage
 *  if your class c inherit from class a and class b and both for them have a method name run()
 *  than in class c you call method run() which one that run() come from. for dear this problem
 * For dear with this problem php allow one class can inherit only super classes but if you want to do 
 * multiple multiple inheritance you can using Interfaces  or using Traits  instead of classes, 
 */

// using trait 
class FrenchGreeting{
    public function sayHello() {
        echo "Bonjou ";
    } 
}
trait EnglishGreeting{
    public function sayHello() {
        echo "Hello ";
    }
    public function sayByebye() {
        echo "Bye Bye ";
    } 
}

class Speak extends FrenchGreeting{
    use  EnglishGreeting;
}

$speak = new Speak();
$speak->sayHello();
$speak->sayByebye();