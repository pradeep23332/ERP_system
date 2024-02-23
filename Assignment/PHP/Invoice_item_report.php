<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/customer.css">
</head>
<body>
    <br>
    <h1><center>Invoice Report Details</center></h1>
    <br/>
    <div class="container" style="padding-left:180px;">
        <form action="" method="POST">
            <div class="mb-4">
                <label class="form-label" for="start_date" style="color:black"> Start Date  *</label>
                <input type="date" class="form-control" name="start_date" style="width:350px" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-d'); ?>" id="start_date" required/>
            </div>

            <div class="mb-4">
                <label class="form-label" for="end_date" style="color:black"> End Date  *</label>
                <input type="date" class="form-control" name="end_date" style="width:350px" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d'); ?>" id="end_date" required/>
            </div>

            <br>
            <input type="submit" name="submit" class="btn btn-primary" value="Search Details"/>
        </form>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Customer name</th>
                    <th>Item name with Item code</th>
                    <th>Item category</th>
                    <th>Invoice amount</th>
                </tr>
            </thead>
            <tbody>
            <?php
if (isset($_POST['submit'])) {
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;

    if ($start_date && $end_date) {
        $connection = mysqli_connect('localhost', 'root', '');
        $db = mysqli_select_db($connection, 'assignment');

        $sql = "SELECT 
                    invoice.invoice_no,
                    invoice.date AS invoiced_date,
                    CONCAT(customer.title, ' ', customer.first_name, ' ', customer.last_name) AS customer_name,
                    CONCAT(item.item_name, ' (', item.item_code, ')') AS item_details,
                    item_category.category AS item_category,
                    item.unit_price AS item_unit_price
                FROM 
                    invoice
                INNER JOIN 
                    customer ON invoice.customer = customer.id
                INNER JOIN 
                    invoice_master ON invoice.invoice_no = invoice_master.invoice_no
                INNER JOIN 
                    item ON invoice_master.item_id = item.id
                INNER JOIN 
                    item_category ON item.item_category = item_category.id
                WHERE 
                    invoice.date BETWEEN '$start_date' AND '$end_date'";

        $query_run = mysqli_query($connection, $sql);

        while ($row = mysqli_fetch_array($query_run)) {
            ?>
            <tr>
                <td><?php echo $row['invoice_no']; ?></td>
                <td><?php echo $row['invoiced_date']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['item_details']; ?></td>
                <td><?php echo $row['item_category']; ?></td>
                <td><?php echo $row['item_unit_price']; ?></td>
            </tr>
            <?php
        }
    } else {
        echo '<tr><td colspan="6">Please select start and end dates</td></tr>';
    }
}
?>
            </tbody>
        </table>
        <br/><br/>
        <button class="btn btn-primary my-9"><a href="Invoice_item_repo.php"class="text-light">Generate PDF Report</a> </button>
        <button class="btn btn-success"><a href="Home.php" class="text-white">Back To Details</a></button>
    </div>
</body>
</html>
