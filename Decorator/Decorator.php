<?php

interface EmailInterface
{
    public function body();
}

class Email implements EmailInterface
{
    public function body()
    {
        return 'Simple email body.';
    }
}

abstract class EmailDecorator implements EmailInterface
{
    public $email;

    public function __construct(EmailInterface $email)
    {
        $this->email = $email;
    }

    abstract public function body();
}

class NewYearEmailDecorator extends EmailDecorator
{
    public function body()
    {
        return $this->email->body() . ' Additional text from deocorator.';
    }
}

// Simple Email
$email = new Email();
var_dump($email->body());

// Decorated Email
$emailNewYearDecorator = new NewYearEmailDecorator($email);
var_dump($emailNewYearDecorator->body());
