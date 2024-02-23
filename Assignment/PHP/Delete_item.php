<?php
include 'connection.php';
if (isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from item where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Delete Successfully";
       header('location:Display_item.php');
    }else{
        die(mysqli_error($con));
    }
}


?>