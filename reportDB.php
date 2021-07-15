<?Php
require('fpdf.php');
include 'connectDB.php';//connection to database
$pdf = new FPDF();
$pdf->AddPage();

$width_cell=array(20,20,20,20,20,20,20,20,20,20);
$pdf->SetFont('Arial','B',8);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts ///
//First header column //
$pdf->Cell($width_cell[0],10,'Bill Number',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Sender Email',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Staff ID',1,0,'C',true);
//Fourth header column//
$pdf->Cell($width_cell[3],10,'Location ID',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'database',1,0,'C',true);

$pdf->Cell($width_cell[5],10,'Re.Name',1,0,'C',true);
$pdf->Cell($width_cell[6],10,'Re.Phone',1,0,'C',true);
$pdf->Cell($width_cell[7],10,'Re.Address',1,0,'C',true);
$pdf->Cell($width_cell[8],10,'Weight',1,0,'C',true);
$pdf->Cell($width_cell[9],10,'Total Proce',1,0,'C',true);
//// header ends ///////

$pdf->SetFont('Arial','',8);
//Background color of header//
$pdf->SetFillColor(235,236,236);
//to give alternate background fill color to rows//
$fill=false;

/// each record is one row  ///
$sql="SELECT * FROM airwaybill ORDER BY date DESC";
$rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
$rc = mysqli_fetch_assoc($rs);
while($rc = mysqli_fetch_array($rs)){
$pdf->Cell($width_cell[0],10,$row['airWaybillNo'],1,0,'C',false);
$pdf->Cell($width_cell[1],10,$row['customerEmail'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['staffID'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['locationID'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['date'],1,0,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['receiverName'],1,0,'C',$fill);
$pdf->Cell($width_cell[6],10,$row['receiverPhoneNumber'],1,0,'C',$fill);
$pdf->Cell($width_cell[7],10,$row['receiverAddress'],1,0,'C',$fill);
$pdf->Cell($width_cell[8],10,$row['weight'],1,0,'C',$fill);
$pdf->Cell($width_cell[9],10,$row['totalPrice'],1,0,'C',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records ///

$pdf->Output();
?>
