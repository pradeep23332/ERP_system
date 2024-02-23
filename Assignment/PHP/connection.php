<?php

$con=new mysqli('localhost','root','','assignment');

    if (!$con){
        die(mysqli_error($con));
    }

?>