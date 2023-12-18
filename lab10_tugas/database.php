<?php

class Database
{
    protected $conn;

    public function __construct($host, $user, $password, $db_name)
    {
        $this->conn = new mysqli($host, $user, $password, $db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function escapeString($value)
    {
        return $this->conn->real_escape_string($value);
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}

?>