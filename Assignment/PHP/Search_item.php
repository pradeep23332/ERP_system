<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  
</head>

<body>
<br/>
<h1><center>Search Item Details</center></h1>
<br/>
<div class="container" style="padding-left:180px;">
    <form action="" method="POST">
        <input type="text" name="item_code" class="form-control" placeholder="Enter Item Code"/><br/><br/>
        <input type="submit" name="search" class="btn btn-primary" value="Search Details"/>
    </form>

    <table class="table">
     <thead class="thead-dark">

        <tr>
            <th>Item Code</th>
            <th>Item Category</th>
            <th>Item sub Category</th>
            <th>Item Name</th>
            <th>quantity</th>
            <th>Unit price</th>
            
        </tr><br>

        <?php



        $connection = mysqli_connect('localhost', 'root', '');
        $db = mysqli_select_db($connection, 'assignment');

        if (isset($_POST['search'])) {
            $code = $_POST['item_code'];

            $query = "select * from item where item_code='$code' ";
            $query_run = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($query_run)) {
                ?>
                <tr>
                    <td><?php echo $row['item_code']; ?></td>
                    <td><?php echo $row['item_category']; ?></td>
                    <td><?php echo $row['item_subcategory']; ?></td>
                    <td><?php echo $row['item_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['unit_price']; ?></td>
                    
                </tr>
                <?php
            }
        }
        ?>
    </table>
    <br/><br/>
    <button class="btn btn-success"><a href="Display_item.php" class="text-white">Back To Details</a></button>
</div>

</body>
</html>
