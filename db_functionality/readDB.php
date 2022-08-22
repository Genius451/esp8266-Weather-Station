<?php

    function readDB(){ 

        // Importing credentials for DB.
        require "connect.php";

        // Creating a new connection to our DB
        $conn = new mysqli(serverName, userName, password, db);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        
        // Make a new request to connected DB
        $sql = "SELECT * FROM test ORDER BY id DESC LIMIT 1";

        // Store request data in $result variable
        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }

?>