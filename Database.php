<?php
class Database
{
    public $connection;
    public function __construct($config, $username = 'root', $password = '')
    {

        //http_build_query($array, '', ';') creates a query string -- example.com?host=localhost;dbname=testdb (the query string is host=localhost;dbname=testdb, separated by semicolon)
        $dsn = "mysql:" . http_build_query($config, '', ';'); //data source name(dsn) contains information about a specific database to which an Open Database Connectivity (ODBC) driver needs to connect.

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]); //creating a new instance of PDO
    }
    public function query($query, $params = [])
    {

        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }

}