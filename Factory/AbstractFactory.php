<?php
/**
 * Abstract Factory Pattern.
 *
 * Unlike the simple factory and factory method pattern, an abstract factory is an interface to create of related objects without specifying/exposing their classes. We can also say that it provides an object of another factory that is responsible for creating required objects.
 */

abstract class AbstractVehicleFactory
{
    abstract public function makeCar();
    abstract public function makeBike();
}

class BangladeshiFactory extends AbstractVehicleFactory
{
    public function makeCar()
    {
        return new ToyotaCar();
    }

    public function makeBike()
    {
        return new YamahaBike();
    }
}

class USAFactory extends AbstractVehicleFactory
{
    public function makeCar()
    {
        return new MercedesCar();
    }

    public function makeBike()
    {
        return new DucatiBike();
    }
}

abstract class AbstractVehicle
{
    abstract public function design();
    abstract public function assemble();
    abstract public function paint();
}

abstract class AbstractCarVehicle extends AbstractVehicle
{

}

abstract class AbstractBikeVehicle extends AbstractVehicle
{

}

class MercedesCar extends AbstractCarVehicle
{
    public function design()
    {
        return 'Designing Mercedes Car';
    }

    public function assemble()
    {
        return 'Assembling Mercedes Car';
    }

    public function paint()
    {
        return 'Painting Mercedes Car';
    }
}

class ToyotaCar extends AbstractCarVehicle
{
    public function design()
    {
        return 'Designing Toyota Car';
    }

    public function assemble()
    {
        return 'Assembling Toyota Car';
    }

    public function paint()
    {
        return 'Painting Toyota Car';
    }
}

class YamahaBike extends AbstractBikeVehicle
{
    public function design()
    {
        return 'Designing Yamaha Bike';
    }

    public function assemble()
    {
        return 'Assembling Yamaha Bike';
    }

    public function paint()
    {
        return 'Painting Yamaha Bike';
    }
}

class DucatiBike extends AbstractBikeVehicle
{
    public function design()
    {
        return 'Designing Ducati Bike';
    }

    public function assemble()
    {
        return 'Assembling Ducati Bike';
    }

    public function paint()
    {
        return 'Painting Ducati Bike';
    }
}

$bangladeshiFactoryInstance = new BangladeshiFactory;
$car = $bangladeshiFactoryInstance->makeCar();
echo $car->design() . '<br/>';
echo $car->assemble() . '<br/>';
echo $car->paint() . '<br/>';

echo '<br/>';

$bike = $bangladeshiFactoryInstance->makeBike();
echo $bike->design() . '<br/>';
echo $bike->assemble() . '<br/>';
echo $bike->paint() . '<br/>';

echo '<br/>';

$usaFactoryInstance = new USAFactory;
$car = $usaFactoryInstance->makeCar();
echo $car->design() . '<br/>';
echo $car->assemble() . '<br/>';
echo $car->paint() . '<br/>';

echo '<br/>';

$bike = $usaFactoryInstance->makeBike();
echo $bike->design() . '<br/>';
echo $bike->assemble() . '<br/>';
echo $bike->paint() . '<br/>';
