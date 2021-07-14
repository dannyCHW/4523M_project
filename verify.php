<!--if accept -> create record , change Weight -->
<?php
include 'staffLoginSession.php';
if(isset($_POST['accept'])){
    $billNumber  = $_POST['billNumber'];
    $weight = $_POST['weight'];
    require_once('connectDB.php');
    $sql = "SELECT deliveryStatusID FROM airwaybilldeliveryrecord WHERE airWaybillNo=$billNumber order by airWaybillDeliveryRecordID DESC LIMIT 1;";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){
        echo "<script type='text/javascript'>
        alert('Invaild! Order does not exist.');
        window.location.href = 'verifyHTML.php';
        </script>";
    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['deliveryStatusID'] != 1){

          echo "<script type='text/javascript'>
          alert('This order no need to verify, please check the status');
          window.location.href = 'verifyHTML.php';
          </script>";
        }else {

              $sql ="UPDATE airwaybill SET weight=$weight,staffID = $_SESSION['staffID'] WHERE airWaybillNo=$billNumber";
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              $date = date('Y-m-d H:i:s');
              $sql ="INSERT INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime, currentLocation) VALUES ('$billNumber',2,'$date','HongKong');";  /// 加staffID? create in airWaybillNo??
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              echo "<script type='text/javascript'>
              alert('Verify successful');
              window.location.href = 'verifyHTML.php';
              </script>";
        }
    }

}
?>
