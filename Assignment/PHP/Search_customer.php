<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/customersearch.css">
   
</head>

<body>
<br>
<h1><center>Search Customer Details</center></h1>
<br/>
<div class="container" style="padding-left:180px;">
    <form action="" method="POST">
        <input type="text" name="first_name" class="form-control" placeholder="Enter First Name"/><br/><br/>
        <input type="submit" name="search" class="btn btn-primary" value="Search Details"/>
    </form>

    <table class="table">
    <thead class="thead-dark">

        <tr>
            <th>Customer ID</th>
            <th>Title</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Contact No</th>
            <th>District</th>
        </tr><br>

        <?php
        $connection = mysqli_connect('localhost', 'root', '');
        $db = mysqli_select_db($connection, 'assignment');

        if (isset($_POST['search'])) {
            $name = $_POST['first_name'];

            $query = "select * from customer where first_name='$name' ";
            $query_run = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['middle_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['contact_no']; ?></td>
                    <td><?php echo $row['district']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <br/><br/>
    <button class="btn btn-success"><a href="Display_customer.php" class="text-white">Back To Details</a></button>
</div>

</body>
</html>
