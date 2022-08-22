<?php

    // Including the file to read our DB
    require "db_functionality/readDB.php";
    
    // Storing data in $data variable
    $data = mysqli_fetch_assoc(readDB());

    // Send back our data in JSON format
    echo json_encode($data);

?>

