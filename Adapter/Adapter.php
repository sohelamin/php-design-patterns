<?php

interface AdapterInterface
{
    public function query($sql);

    public function result();
}

class MySQLAdapter implements AdapterInterface
{
    protected $connection;

    protected $result;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->connection = new mysqli($host, $username, $password, $dbname);
    }

    public function query($sql)
    {
        $this->result = $this->connection->query($sql);

        return $this;
    }

    public function result()
    {
        if (gettype($this->result) === 'boolean') {
            return $this->result;
        } elseif ($this->result->num_rows > 0) {
            $result = [];

            while ($row = $this->result->fetch_assoc()) {
                $result[] = $row;
            }

            return $result;
        } else {
            return [];
        }
    }
}

class PDOAdapter implements AdapterInterface
{
    protected $connection;

    protected $result;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }

    public function query($sql)
    {
        $query = $this->connection->prepare($sql);
        $exec = $query->execute();

        if ($query->columnCount() == 0) {
            $this->result = $exec;
        } else {
            $this->result = $query;
        }

        return $this;
    }

    public function result()
    {
        if (gettype($this->result) === 'boolean') {
            return $this->result;
        } else {
            $data = [];

            while ($row = $this->result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }

            return $data;
        }
    }
}

class Database
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function query($sql)
    {
        return $this->adapter->query($sql);
    }

    public function result()
    {
        return $this->adapter->result();
    }
}

$mysql = new MySQLAdapter('localhost', 'root', '1234', 'demo');
$db = new Database($mysql);

$query = $db->query("SELECT * FROM users");
$result = $query->result();
var_dump($result);
