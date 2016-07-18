<?php

class Singleton
{
    private static $instance;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {

    }

    public function sayHi()
    {
        echo 'Hi';
    }
}

$singleton = Singleton::getInstance();

$singleton->sayHi();
