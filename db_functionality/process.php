<?php

    // Require the php file with update DB.
    require "updateDB.php";

    // Receive the content of POST request from ESP8266 and store it in $json variable
    $json = file_get_contents('php://input');

    // Decode the data sent and store it in $data variable (in our case temperature and humidity)
    $data = json_decode($json);

    // Call function to write these values in DB
    updateDB($data->temperature, $data->humidity);

    // Send the response back to ESP8266
    echo "Received. \r\n";

?>