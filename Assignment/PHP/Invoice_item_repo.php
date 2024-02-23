<?php
require('pdfsetting.php');

include 'connection.php';

$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;

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

        $result = $con->query($sql);

        $pdf =  new FPDF();
        $pdf->AddPage('L','A3',0);
        $pdf->SetFont('Times','B',12);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(276,5,'Invoice Report',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Times','',14);
        $pdf->Cell(276,10,'Invoice Information',0,0,'C');
        $pdf->Ln(20);

        $pdf->SetFont('Times','B',12);
        $pdf->cell(50,10,'Invoice Number',1,0,'C');
        $pdf->cell(50,10,'Date',1,0,'C');
        $pdf->cell(58,10,'Customer',1,0,'C');
        $pdf->cell(50,10,'Customer District',1,0,'C');
        $pdf->cell(50,10,'Item Count',1,0,'C');
        $pdf->cell(50,10,'Invoice Amount',1,0,'C');
        $pdf->Ln();

        while($row = $result->fetch_object()){
            $invoice_no = $row->invoice_no;
            $invoiced_date = $row->invoiced_date;
            $customer_name = $row->customer_name;
            $item_details = $row->item_details;
            $item_category = $row->item_category;
            $item_unit_price = $row->item_unit_price;

            $pdf->Cell(50,10, $invoice_no,1);
            $pdf->Cell(50,10, $invoiced_date,1);
            $pdf->Cell(58,10,$customer_name,1);
            $pdf->Cell(50,10,$item_details ,1);
            $pdf->Cell(50,10,$item_category,1);
            $pdf->Cell(50,10,$item_unit_price,1);
            $pdf->Ln();
        }

        // Move the Output() method call to the end
        $pdf->Output();
    
        echo "Start date and/or end date not provided.";
    

?>













