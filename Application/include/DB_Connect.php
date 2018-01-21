<?php

/**
 * Created by PhpStorm.
 * User: Devang
 * Date: 10/16/2017
 * Time: 9:38 PM
 */
class DB_Connect
{
    private $conn;

    // Connecting to database
    public function connect() {
//        $servername = "localhost";
//        $username = "root";
//        $password = "";
//        $dbname = "feedbacksystem";

        include 'config.php';
        // Connecting to mysql database
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // return database handler
        return $this->conn;
    }

    function close() {
        // closing db connection
        mysqli_close();
    }
}