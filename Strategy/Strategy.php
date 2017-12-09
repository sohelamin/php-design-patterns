<?php

interface TravelStrategy
{
    public function travel();
}

class BusTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Bus travel strategy will goes here
    }
}

class TrainTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Train travel strategy will goes here
    }
}

class PlaneTravelStrategy implements TravelStrategy
{
    public function travel()
    {
        // Plane travel strategy will goes here
    }
}

class Traveler
{
    protected $traveler;

    public function __construct(TravelStrategy $traveler)
    {
        $this->traveler = $traveler;
    }

    public function travel()
    {
        $this->traveler->travel();
    }
}

$traveler = new Traveler(new BusTravelStrategy());
$traveler->travel();

$traveler1 = new Traveler(new PlaneTravelStrategy());
$traveler1->travel();
