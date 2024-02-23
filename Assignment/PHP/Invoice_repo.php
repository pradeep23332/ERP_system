<?php
require('pdfsetting.php');

include 'connection.php';

$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;
        $select = "SELECT 
                        invoice.invoice_no,
                        invoice.date,
                        CONCAT(customer.title, ' ', customer.first_name, ' ', customer.last_name) AS customer_name,
                        customer.district,
                        invoice.item_count,
                        invoice.amount
                    FROM 
                        invoice
                    INNER JOIN 
                        customer ON invoice.customer = customer.id
                    WHERE 
                        invoice.date BETWEEN '$start_date' AND '$end_date'";
                    
        $result = $con->query($select);

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
            $date = $row->date;
            $district = $row->district;
            $quantity = $row->item_count;
            $amount = $row->amount;

            $pdf->Cell(50,10, $invoice_no,1);
            $pdf->Cell(50,10, $date,1);
            $pdf->Cell(58,10,$district,1);
            $pdf->Cell(50,10,$quantity,1);
            $pdf->Cell(50,10,$amount,1);
            $pdf->Ln();
        }

        // Move the Output() method call to the end
        $pdf->Output();
    
        echo "Start date and/or end date not provided.";
    

?>













