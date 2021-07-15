<?Php
require('fpdf.php');
include 'connectDB.php';//connection to database
$pdf = new FPDF();
$pdf->AddPage();

$width_cell=array(20,20,20,20,20,20,20,20,20,70);
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
$pdf->Cell($width_cell[4],10,'Date',1,0,'C',true);
$pdf->Cell($width_cell[5],10,'Re.Name',1,0,'C',true);
$pdf->Cell($width_cell[6],10,'Re.Phone',1,0,'C',true);
$pdf->Cell($width_cell[7],10,'Weight',1,0,'C',true);
$pdf->Cell($width_cell[8],10,'Total Proce',1,1,'C',true);
$pdf->Cell($width_cell[9],10,'Re.Address',1,1,'C',true);
//// header ends ///////

$pdf->SetFont('Arial','',6);
//Background color of header//
$pdf->SetFillColor(235,236,236);
//to give alternate background fill color to rows//
$fill=false;

/// each record is one row  ///
$sql="SELECT * FROM airwaybill ORDER BY date DESC";
$rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
$rc = mysqli_fetch_assoc($rs);
while($rc = mysqli_fetch_array($rs)){
    $pdf->Cell($width_cell[0],10,$rc['airWaybillNo'],1,0,'C',false);
    $pdf->Cell($width_cell[1],10,$rc['customerEmail'],1,0,'L',false);
    $pdf->Cell($width_cell[2],10,$rc['staffID'],1,0,'C',false);
    $pdf->Cell($width_cell[3],10,$rc['locationID'],1,0,'C',false);
    $pdf->Cell($width_cell[4],10,$rc['date'],1,0,'C',false);
    $pdf->Cell($width_cell[5],10,$rc['receiverName'],1,0,'C',false);
    $pdf->Cell($width_cell[6],10,$rc['receiverPhoneNumber'],1,0,'C',false);
    $pdf->Cell($width_cell[7],10,$rc['weight'],1,0,'C',false);
    $pdf->Cell($width_cell[8],10,$rc['totalPrice'],1,1,'C',false);
    $pdf->Cell($width_cell[9],10,$rc['receiverAddress'],1,1,'C',false);
  }

$pdf->Output();
?>
