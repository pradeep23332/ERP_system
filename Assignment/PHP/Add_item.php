<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $item_code = $_POST['item_code'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    // Prepare the SQL statement using prepared statements
    $sql = "INSERT INTO `item` (item_code, item_category, item_subcategory, item_name, quantity, unit_price) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ssssss', $item_code, $item_category ,  $item_subcategory, $item_name , $quantity, $unit_price);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Data inserted successfully
        header('location:Display_item.php');
        exit(); // Stop further execution
    } else {
        // Error occurred
        echo '<div class="alert alert-danger" role="alert">Failed to add item: ' . mysqli_error($con) . '</div>';
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

    <title>Add item</title>
    <link rel="stylesheet" href="../CSS/customer.css">
    <style>
    .container {
        background-color: none;

    }
    </style>

</head>

<body>


    <div class="container my-5" style="padding-left:200px;">
        <form method="post">
            <br />
             <center><h2>Add Items</h2></center>
             <br/>

            <div class="form-group">
                <label><b> Item Code</b></label><br />
                <input type="text" class="form-control" placeholder="Enter item code" name="item_code" required>
            </div><br />

            
            <div class="form-group">
                <label><b> Item Name</b></label><br />
                <input type="text" class="form-control" placeholder="Enter item Name" name="item_name" required>
            </div><br />




            <div class="form-group ">
                <label><b> Item Category</b></label><br />
                <select class="form-select" name="item_category" required>

                    <option selected>Choose category</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <br>


            
            <div class="form-group ">
                <label><b> Item Sub Category</b></label><br />
                <select class="form-select" name="item_subcategory" required>

                    <option selected>Choose category</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <br>


            <div class="form-group">
                <label><b> Quantity</b></label><br />
                <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" required>
            </div><br />

            <div class="form-group">
                <label><b> Unit Price </b></label><br />
                <input type="text" class="form-control" placeholder="Enter unit price" name="unit_price" required>
            </div><br />

            
            

            <br /><br />
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-warning my-5"><a href="Display_item.php"class="text-light">Back</a></button>   
        </form>

    </div>


</body>

</html>
