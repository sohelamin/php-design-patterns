<?php

class Cart
{
    public function addProducts($products)
    {
        // Product adding codes goes here
    }

    public function getProducts()
    {
        // Product retrieval codes goes here
    }
}

class Order
{
    public function process($products)
    {
        // Order processing codes goes here
    }
}

class Payment
{
    public function charge($charge)
    {
        // Additional charge codes goes here
    }

    public function makePayment()
    {
        // Payment method verify & payment codes goes here
    }
}

class Shipping
{
    public function calculateCharge()
    {
        // Calculation codes goes here
    }

    public function shipProducts()
    {
        // Ship process codes goes here
    }
}

class CustomerFacade
{
    public function __construct()
    {
        $this->cart = new Cart;
        $this->order = new Order;
        $this->payment = new Payment;
        $this->shipping = new Shipping;
    }

    public function addToCart($products)
    {
        $this->cart->addProducts($products);
    }

    public function checkout()
    {
        $products = $this->cart->getProducts();

        $this->totalAmount = $this->order->process($products);
    }

    public function makePayment()
    {
        $charge = $this->shipping->calculateCharge();
        $this->payment->charge($charge);

        $isCompleted = $this->payment->makePayment();

        if ($isCompleted) {
            $this->shipping->shipProducts();
        }
    }
}

$customer = new CustomerFacade;

$products = [
    [
        'name' => 'Polo T-Shirt',
        'price' => 40,
    ],
    [
        'name' => 'Smart Watch',
        'price' => 400,
    ],
];

$customer->addToCart($products);
$customer->checkout();
$customer->makePayment();
