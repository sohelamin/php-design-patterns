<?php

class Model implements \SplSubject
{
    protected $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();

        foreach ($this->setObservers() as $observer) {
            $this->attach($observer);
        }
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    protected function setObservers()
    {
        return [];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        // notify the observers, that model has been updated
        $this->notify();
    }
}

class Post extends Model
{
    protected function setObservers()
    {
        return [
            new PostModelObserver,
            new Observer2,
        ];
    }
}

class PostModelObserver implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

class Observer2 implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

$post1 = new Post();
$post2 = new Post();
$post3 = new Post();

$post1->title = 'Hello World';
$post2->title = 'Another Post Title';
$post3->body = 'Lorem ipsum............';
