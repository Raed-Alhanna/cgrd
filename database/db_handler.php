<?php
class DBHandler
{
    private $connection;

    protected function connect()
    {
        if ($this->connection) {
            return $this->connection;
        }
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'mydb';

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {


            throw new Exception('Database connection error: ' . $e->getMessage());
        }
    }
} ?>