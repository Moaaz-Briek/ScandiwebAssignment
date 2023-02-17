<?php

abstract class MySQlQueryBuilder
{
    private PDO $pdoConnection;
    private string $query = '';
    private string $tableName;
    private $stmt;
    private array $data = array();
    function __construct($tableName)
    {
        $this->pdoConnection = (new DatabaseConnection())->getConnection();
        $this->tableName = $tableName;
    }

    public function select(array $columns)
    {
        $this->query = 'SELECT '.implode(',', $columns).' FROM '.$this->tableName;
        return $this;
    }

    public function where(string $column, string $operator, string $value)
    {
        $this->data[] = $value;

        $this->query .= ' WHERE '.$column.' '.$operator.' ?';
        return $this;
    }

    public function delete(string $column, string $value): void
    {
        $query = 'DELETE FROM '.$this->tableName.' WHERE '.$column.'=?';
        $this->pdoConnection->prepare($query)->execute([$value]); // execute with data!
    }

    public function insert(array $data)
    {
        $this->data = array_merge($this->data, $data);
        $this->query = "INSERT INTO `products`(`sku`, `name`, `price`, `type`, `attribute`) VALUES (?,?,?,?,?)";
        return $this->bind();
        // $this->query = "INSERT INTO `products`(`sku`, `name`, `price`, `type`, `attribute`) VALUES ('moaaz','s','4','dvd', '8 MB')";
        // $link = new PDO("mysql:host=localhost;dbname=id20285180_moaazassignment",'id20285180_assignment','01011703520#$$$fkfeDS');
        // echo 'qurybuilder';
        // $stmt = $link->prepare($this->query);
        // $stmt->execute();
    }

    private function bind()
    {
        $this->stmt = $this->pdoConnection->prepare($this->query);
        $this->stmt->execute($this->data);
        $this->data = array();
        return $this->stmt;
    }

    public function get(): array
    {
        return $this->bind()->fetchAll(PDO::FETCH_ASSOC);
    }
};


