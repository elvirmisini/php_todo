<?php

    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","123456");
    define("DATABASE","crud_operations");


    $connection=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

    if(!$connection){
        die("Connection failed");

    }

?>