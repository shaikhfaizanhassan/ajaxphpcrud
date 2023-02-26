<?php 

    $firstname = $_POST["firstname"];
    $con = mysqli_connect("localhost","root","","testing");
    $sql  = "insert into student (name) values ('{$firstname}')";

    if(mysqli_query($con,$sql))
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>