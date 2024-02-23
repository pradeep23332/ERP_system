<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from item where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$item_code=$row['item_code'];
$item_category=$row['item_category'];
$item_subcategory =$row['item_subcategory'];
$item_name=$row['item_name'];
$quantity=$row['quantity'];
$unit_price=$row['unit_price'];




if (isset($_POST['submit'])){
    $item_code = $_POST['item_code'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

   $sql="update item set id='$id',item_code='$item_code', item_category='$item_category', item_subcategory='$item_subcategory', item_name='$item_name', quantity='$quantity', unit_price='$unit_price'
   where id=$id";
   $result=mysqli_query($con,$sql);

   if($result){
      // echo "Data Updated Succfully";
      header('location:Display_item.php');
   }else{
    die(mysqli_error($con));
   }
   
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/customer.css">


    <title>UPDATE Item Details</title>

    


       
  </head>
    
    <body>
       
    
       <br>

       <center><ul><h1> Update Item  Details </h1></ul></center>
    
    <div class="container my-5"style="padding-left:200px;">
        <form method ="post">
              <br/>


            <div class="form-group">
            <label><b> Item Code </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter item code" name ="item_code"  value=<?php echo $item_code;?> required/>
            </div><br/>

            

            <div class="form-group ">
              <label> <b>Item Category </b></label><br/>  
               <select class="form-select" name="item_category"  required>
               <?php echo "<option value='". $item_category."'>" .$item_category ."</option>"; ?>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
               </select>
               
 
            </div><br/>


            <div class="form-group ">
              <label> <b>Item Sub Category </b></label><br/>  
               <select class="form-select" name="item_subcategory"  required>
               <?php echo "<option value='". $item_subcategory."'>" .$item_subcategory ."</option>"; ?>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
               </select>
               
 
            </div><br/>

            <div class="form-group">
            <label><b> Item Name </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter item name" name ="item_name"  value=<?php echo $item_name;?> required/>
            </div><br/>

            <div class="form-group">
            <label><b> Quantity </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter quantity" name ="quantity"  value=<?php echo $quantity;?> required/>
            </div><br/>

            <div class="form-group">
            <label><b>Unit Price </b> </label><br/>
            <input type="text" class="form-control"name="unit_price" value=<?php echo $unit_price;?> required/>
            </div>
            <br/>







              
           

            

          

           
 
            <br/><br/>
            <button type="submit" class="btn btn-primary"name="submit">Update Details</button>
            
        </form>
        </div>
        
        
   
    </body>




</html>