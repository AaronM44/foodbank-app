<?php

    function connect() {
        
        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "foodbank";

        // Create connection
        $conn = new mysqli($server, $user);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn->select_db($db);
        
        return $conn;
    }

?>
