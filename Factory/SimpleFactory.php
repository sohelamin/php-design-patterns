<?php

// Simple Factory Pattern. This allows interfaces for creating objects without exposing the object creation logic to the client.

class CarFactory
{
    protected $brands = [];

    public function __construct()
    {
        $this->brands = [
            'mercedes' => 'MercedesCar',
            'toyota' => 'ToyotaCar',
        ];
    }

    public function make($brand)
    {
        if (!array_key_exists($brand, $this->brands)) {
            return new Exception('Not available this car');
        }

        $className = $this->brands[$brand];

        return new $className();
    }
}

interface CarInterface
{
    public function design();
    public function assemble();
    public function paint();
    public function buildUp();
}

class MercedesCar implements CarInterface
{
    public function design()
    {
        echo 'Designing Mercedes Car <br/>';
    }

    public function assemble()
    {
        echo 'Assembling Mercedes Car <br/>';
    }

    public function paint()
    {
        echo 'Painting Mercedes Car <br/>';
    }

    public function buildUp()
    {
        $this->design();
        $this->assemble();
        $this->paint();
    }
}

class ToyotaCar implements CarInterface
{
    public function design()
    {
        echo 'Designing Toyota Car <br/>';
    }

    public function assemble()
    {
        echo 'Assembling Toyota Car <br/>';
    }

    public function paint()
    {
        echo 'Painting Toyota Car <br/>';
    }

    public function buildUp()
    {
        $this->design();
        $this->assemble();
        $this->paint();
    }
}

$carFactory = new CarFactory;

$mercedes = $carFactory->make('mercedes');
$mercedes->buildUp();
echo '<br/>';

$toyota = $carFactory->make('toyota');
$toyota->buildUp();
