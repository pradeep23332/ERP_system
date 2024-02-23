<?php
include 'connection.php';
?>

<!doctype html>
<html lang="en">
    <head>
         <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>All Details </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/dabbda7d23.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../CSS/customer.css">
        
    
    </head>

    <body>

        <br><br>
        <center><ul><h2>ALL Customer DETAILS</h2></ul> </center>
        <div class="container" style="padding-left:180px;">
        <br/><br/>


            <br/>
            

            <button class="btn btn-success"><a href="Home.php" class="text-white">Back To Details</a></button>
            <br><br>
            <table class="table">
              <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">District</th>
                    <th scope="col">Actions</th>
               </tr>
              </thead>
            <tbody>


   <?php
 
 $sql="Select * from customer ";
 $result=mysqli_query($con,$sql);
 if ($result){
     while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $title=$row['title'];
        $first_name=$row['first_name'];
        $middle_name=$row['middle_name'];
        $last_name=$row['last_name'];
        $contact_no=$row['contact_no'];
        $district=$row['district'];
        echo ' <tr>

        <th scope="row"> '.$id.'</th>
        <td>'.$title.'</td>
        <td>'.$first_name.'</td>
        <td>'.$middle_name.'</td>
        <td>'.$last_name.'</td>
        <td>'.$contact_no.'</td>
        <td>'.$district.'</td>
        <td>
        <button class="btn btn-primary"><a href="Update_customer.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="Delete_customer.php? deleteid='.$id.'" class="text-light">Delete</a></button>
        </td> 
        </tr>';
     }
 }



   ?>

  
   
  </tbody>
</table>

<button class="btn btn-primary my-5"><a href="Add_customer.php"class="text-light">Add Customer details</a></button> 
<button class="btn btn-warning my-9"><a href="Search_customer.php"class="text-light">Search Customer deatils</a> </button>

</div>

    </body>


</html>
