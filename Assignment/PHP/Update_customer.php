<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from customer where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$title=$row['title'];
$first_name=$row['first_name'];
$middle_name=$row['middle_name'];
$last_name=$row['last_name'];
$contact_no=$row['contact_no'];
$district=$row['district'];






if (isset($_POST['submit'])){
   $title=$_POST['title'];
   $first_name=$_POST['first_name'];
   $middle_name=$_POST['middle_name'];
   $last_name=$_POST['last_name'];
   $contact_no=$_POST['contact_no'];
   $district=$_POST['district'];

   $sql="update customer set id='$id',title='$title', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', contact_no='$contact_no', district='$district'
   where id=$id";
   $result=mysqli_query($con,$sql);

   if($result){
      // echo "Data Updated Succfully";
      header('location:Display_customer.php');
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
    


    <title>Update Customer Details</title>

    


       
  </head>
    
    <body>
       
       <br>

       <center><ul><h1> Update Customer Details </h1></ul></center>
    
    <div class="container my-5"style="padding-left:200px;">
        <form method ="post">
              <br/>

              <div class="form-group ">
              <label> <b>Title </b></label><br/>  
               <select class="form-select" name="title"  required>
               <?php echo "<option value='". $title."'>" .$title ."</option>"; ?>
                  <option value="Mr">Mr</option>
                  <option value="Mrs">Mrs</option>
                  <option value="Miss">Miss</option>
                  <option value="Dr">Dr</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
               </select>
               
 
            </div><br/>
           

            <div class="form-group">
            <label><b> First Name </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter first name" name ="first_name"  value=<?php echo $first_name;?> required/>
            </div><br/>

            <div class="form-group">
            <label><b> Middle Name </b></label><br/>
            <input type="text" class="form-control" 
            placeholder="Enter middle name" name ="middle_name"  value=<?php echo $middle_name;?> required/>
            </div><br/>

            <div class="form-group">
            <label><b>Last Name </b> </label><br/>
            <input type="text" class="form-control"name="last_name" value=<?php echo $last_name;?> required/>
            </div>
            <br/>

           <div class="form-group">
            <label><b>Contact_No</b>  </label><br/>
            <input type="text" class="form-control"name="contact_no"  value=<?php echo $contact_no;?> required/>
            </div>
           

          <br/>

           
            <div class="form-group ">
            <label> <b>District </b></label><br/>  
               <select class="form-select" name="district"  required>
               <?php echo "<option value='". $district."'>" .$district ."</option>"; ?>
                  
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Moneragala">Moneragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Rathnapura">Rathnapura</option>
                    <option value="Vavuniya">Vavuniya</option>
                  <label class="input-group-text" for="inputGroupSelect02">Options</label>
               </select>
               
 
</div>
 
            <br/><br/>
            <button type="submit" class="btn btn-primary"name="submit">Update Details</button>
             <button class="btn btn-warning my-5"><a href="Display_customer.php"class="text-light">Back</a></button>
        </form>
        </div>
        
        
   
    </body>




</html>