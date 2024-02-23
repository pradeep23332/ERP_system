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
        <link rel="stylesheet" href="../CSS/item.css">
    
    </head>

    <body>

        <br><br>
        <center><ul><h2>All Item Details</h2></ul> </center>
        <div class="container" style="padding-left:180px;">
        <br/><br/>


            <br/>
            

            <button class="btn btn-success"><a href="Home.php" class="text-white">Back To Details</a></button>
            <br><br>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Item Code</th>
                <th scope="col">Item Category</th>
                <th scope="col">Item SubCategory</th>
                <th scope="col">Item Name</th>
                <th scope="col">quantity</th>
                <th scope="col">Unit Price</th>
                
            </tr>
        </thead>
        <tbody>


   <?php
 
 $sql="Select * from item ";
 $result=mysqli_query($con,$sql);
 if ($result){
     while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $item_code=$row['item_code'];
        $item_category=$row['item_category'];
        $item_subcategory=$row['item_subcategory'];
        $item_name=$row['item_name'];
        $quantity=$row['quantity'];
        $unit_price=$row['unit_price'];
        echo ' <tr>

        <th scope="row"> '.$id.'</th>
        <td>'.$item_code.'</td>
        <td>'.$item_category.'</td>
        <td>'.$item_subcategory.'</td>
        <td>'.$item_name.'</td>
        <td>'.$quantity.'</td>
        <td>'.$unit_price.'</td>
        <td>
        <button class="btn btn-primary"><a href="Update_item.php?updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="Delete_item.php? deleteid='.$id.'" class="text-light">Delete</a></button>
        </td> 
        </tr>';
     }
 }



   ?>

  
   
  </tbody>
</table>

<button class="btn btn-primary my-5"><a href="Add_item.php"class="text-light">Add Item details</a></button> 
<button class="btn btn-warning my-9"><a href="Search_item.php"class="text-light">Search Item deatils</a> </button>
<button class="btn btn-success my-9"><a href="Item_report.php"class="text-light">Generate PDF Report</a> </button>


        


</div>

    </body>


</html>
