<?php


class Connection
{
    protected $connection;
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'test';
    protected $port = 3306;
    protected $isConnected = false;

    public function __construct($host = 'localhost', $user = 'root', $password = '', $database = 'oop', $port = 3306)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }

    public function getConnection()
    {

        if (!$this->isConnected) {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
            $this->isConnected = true;
        }
        return $this->connection;

    }

}