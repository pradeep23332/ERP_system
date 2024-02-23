<?php
require('pdfsetting.php');

include 'connection.php';

$select = 'SELECT 
                item.item_name,
                item_category.category AS item_category,
                item_subcategory.sub_category AS item_subcategory,
                SUM(item.quantity) AS total_quantity
           FROM 
                item
           INNER JOIN 
                item_category ON item.item_category = item_category.id
           INNER JOIN 
                item_subcategory ON item.item_subcategory = item_subcategory.id
           GROUP BY 
                item.item_name;
            ';
$result = $con->query($select);

$pdf =  new FPDF();
$pdf->AddPage('L','A3',0);
$pdf->SetFont('Times','B',12);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(276,5,'Items Report',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->Cell(276,10,'Items Information',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Times','B',12);
$pdf->cell(50,10,'Item Name',1,0,'C');
$pdf->cell(50,10,'Item Category',1,0,'C');
$pdf->cell(58,10,'Item Sub Category',1,0,'C');
$pdf->cell(50,10,'Item Quantity',1,0,'C');
$pdf->Ln();

while($row = $result->fetch_object()){
    $item_name = $row->item_name;
    $item_category = $row->item_category;
    $item_subcategory = $row->item_subcategory;
    // Use total_quantity instead of quantity
    $quantity = $row->total_quantity;

    $pdf->Cell(50,10,$item_name,1);
    $pdf->Cell(50,10, $item_category,1);
    $pdf->Cell(58,10,$item_subcategory,1);
    $pdf->Cell(50,10,$quantity,1);
    $pdf->Ln();
}

// Move the Output() method call to the end
$pdf->Output();
?>
