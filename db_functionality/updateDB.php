<?php

require 'connect.php'; // Require the file with declarated variables.

function updateDB($temperature, $humidity){
    // Obtain current time depending on your zone.
    $dt = new DateTime("now", new DateTimeZone(zone));
    
    // Formating it for MySQL database (current_timestamp).
    $date = $dt->format('Y-m-d H:i:s'); 

    // Opening a connection to your DB.
    $conn = new mysqli(serverName, userName, password, db);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    //Create a SQL statement, to insert temperature, humidity and current time in our DB. ID is incremented automatically by DB.
    $sql = "INSERT INTO test (temperature, humidity, timeStamp) VALUES ($temperature, $humidity , '$date') ";

    // IF connection was succesful, print message below.
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    }

    // Otherwise, print Error
    else {
        echo "Error updating record: " . $conn->error;
    }

    //Close connection.
    $conn->close();

}

?>