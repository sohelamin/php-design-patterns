<?php

class Database
{
    protected $adapter;

    public function __construct(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

class MysqlAdapter
{

}

class Database2
{
    protected $adapter;

    public function setterMethod(MySqlAdapter $adapter)
    {
        $this->adapter = $adapter;
    }
}

class Database3
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }
}

interface AdapterInterface
{

}

class MysqlAdapter2 implements AdapterInterface
{

}

/** Usage **/
// Contructor Injection
$mysqlAdapter = new MysqlAdapter;
$database = new Database($mysqlAdapter);

// Setter Method Injection
$mysqlAdapter = new MysqlAdapter;
$database = new Database();
$database->setterMethod($mysqlAdapter);

// Interface Injection
$mysqlAdapter = new MysqlAdapter2;
$database = new Database($mysqlAdapter);
