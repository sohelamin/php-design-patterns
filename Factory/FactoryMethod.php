<?php
/**
 * Factory Method Pattern.
 *
 * This allows interfaces for creating objects, but allow subclasses to determine which class to instantiate.
 */
abstract class VehicleFactoryMethod
{
    abstract public function make($brand);
}

class CarFactory extends VehicleFactoryMethod
{
    public function make($brand)
    {
        $car = null;

        switch ($brand) {
            case "mercedes":
                $car = new MercedesCar;
                break;
            case "toyota":
                $car = new ToyotaCar;
                break;
        }

        return $car;
    }
}

class BikeFactory extends VehicleFactoryMethod
{
    public function make($brand)
    {
        $bike = null;

        switch ($brand) {
            case "yamaha":
                $bike = new YamahaBike;
                break;
            case "ducati":
                $bike = new DucatiBike;
                break;
        }

        return $bike;
    }
}

interface CarInterface
{
    public function design();

    public function assemble();

    public function paint();
}

interface BikeInterface
{
    public function design();

    public function assemble();

    public function paint();
}

class MercedesCar implements CarInterface
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

class ToyotaCar implements CarInterface
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

class YamahaBike implements BikeInterface
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

class DucatiBike implements BikeInterface
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

$carFactoryInstance = new CarFactory;

$mercedes = $carFactoryInstance->make('mercedes');
echo $mercedes->design() . '<br/>';
echo $mercedes->assemble() . '<br/>';
echo $mercedes->paint() . '<br/>';

echo '<br/>';

$toyota = $carFactoryInstance->make('toyota');
echo $toyota->design() . '<br/>';
echo $toyota->assemble() . '<br/>';
echo $toyota->paint() . '<br/>';

echo '<br/>';

$bikeFactoryInstance = new BikeFactory;

$yamaha = $bikeFactoryInstance->make('yamaha');
echo $yamaha->design() . '<br/>';
echo $yamaha->assemble() . '<br/>';
echo $yamaha->paint() . '<br/>';

echo '<br/>';

$ducati = $bikeFactoryInstance->make('ducati');
echo $ducati->design() . '<br/>';
echo $ducati->assemble() . '<br/>';
echo $ducati->paint() . '<br/>';
