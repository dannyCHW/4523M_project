<?Php
require('fpdf.php');
include 'connectDB.php';//connection to database
$pdf = new FPDF();
$pdf->AddPage();

$width_cell=array(30,20,20,30,40,20,20,60,60,60);
$pdf->SetFont('Arial','B',8);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts ///
//First header column //
$pdf->Cell($width_cell[0],10,'Air Waybill Number',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Staff ID',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Location ID',1,0,'C',true);
$pdf->Cell($width_cell[3],10,'Receiver Name',1,0,'C',true);
$pdf->Cell($width_cell[4],10,'Receiver Phone Number',1,0,'C',true);
$pdf->Cell($width_cell[5],10,'Weight',1,0,'C',true);
$pdf->Cell($width_cell[6],10,'Total Price',1,1,'C',true);
$pdf->Cell($width_cell[7],10,'Customer Email',1,0,'C',true);
$pdf->Cell($width_cell[8],10,'Re.Address',1,0,'C',true);
$pdf->Cell($width_cell[9],10,'Date',1,1,'C',true);
//// header ends ///////

$pdf->SetFont('Arial','',6);
//Background color of header//
$pdf->SetFillColor(235,236,236);

/// each record is one row  ///
$sql="SELECT * FROM airwaybill ORDER BY date DESC";
$rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
while($rc = mysqli_fetch_array($rs)){
    $pdf->Cell($width_cell[0],10,$rc['airWaybillNo'],1,0,'C',false);
    $pdf->Cell($width_cell[1],10,$rc['staffID'],1,0,'C',false);
    $pdf->Cell($width_cell[2],10,$rc['locationID'],1,0,'C',false);
    $pdf->Cell($width_cell[3],10,$rc['receiverName'],1,0,'C',false);
    $pdf->Cell($width_cell[4],10,$rc['receiverPhoneNumber'],1,0,'C',false);
    $pdf->Cell($width_cell[5],10,$rc['weight'],1,0,'C',false);
    $pdf->Cell($width_cell[6],10,$rc['totalPrice'],1,1,'C',false);
    $pdf->Cell($width_cell[7],10,$rc['customerEmail'],1,0,'C',false);
    $pdf->Cell($width_cell[8],10,$rc['receiverAddress'],1,0,'C',false);
    $pdf->Cell($width_cell[9],10,$rc['date'],1,1,'C',false);
  }

$pdf->Output();
?>
