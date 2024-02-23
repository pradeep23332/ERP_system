<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `customer` (title, first_name, middle_name, last_name, contact_no, district) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssss', $title, $first_name, $middle_name, $last_name, $contact_no, $district);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Data inserted successfully
        header('location:Display_customer.php');
        exit(); // Stop further execution
    } else {
        // Error occurred
        echo '<div class="alert alert-danger" role="alert">Failed to add customer: ' . mysqli_error($con) . '</div>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Customer</title>
    <link rel="stylesheet" href="../CSS/addcustomer.css">
    <style>
    .container {
        background-color: none;

    }
    </style>

</head>

<body>
          
      <center><h2>Add Customer Details</h2></center>

      <div class="container my-5" style="padding-left:200px;">
        <form method="post">
            <br />

            <div class="form-group ">
                <label><b> Title</b></label><br />
                <select class="form-select" name="title" required>

                    <option selected>Choose title</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr</option>
                </select>
            </div>
            <br>

            <div class="form-group">
                <label><b> First Name</b></label><br />
                <input type="text" class="form-control" placeholder="Enter First Name" name="first_name"
                    pattern="[A-Za-z\s]+" required>
            </div><br />

            <div class="form-group">
                <label><b> Middle Name</b></label><br />
                <input type="text" class="form-control" placeholder="Enter Middle Name" name="middle_name"
                    pattern="[A-Za-z\s]+" required>
            </div><br />

            <div class="form-group">
                <label><b> Last Name</b></label><br />
                <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name"
                    pattern="[A-Za-z\s]+" required>
            </div><br />

            <div class="form-group">
                <label><b>Contact Number</b></label><br />
                <input type="tel" class="form-control" placeholder="Enter Contact Number" name="contact_no"
                    pattern="[0-9]{10}" title="Phone number should have 10 digits only" required>
            </div><br />


            <div class="form-group ">
                <label><b> District</b></label><br />
                <select class="form-select" name="district" required>

                    <option selected>Choose District</option>
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

            <br /><br />
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-warning my-5"><a href="Display_customer.php"class="text-light">Back</a></button>   
        </form>

    </div>


</body>

</html>
