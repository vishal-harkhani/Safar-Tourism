<?php

    $conn = mysqli_connect("localhost","root","","safar_login");

    if(!$conn)
    {
        die("Connection failed...".mysqli_connect_error());
    }

?>