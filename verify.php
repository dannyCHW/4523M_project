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

            //

            $sql = "SELECT locationID FROM airwaybill WHERE airWaybillNo = $billNumber ;";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            $rc = mysqli_fetch_assoc($rs);
            $theLocationID = $rc['locationID'];

            $sql = "SELECT rate FROM chargetable WHERE locationID = '$theLocationID' AND  ;";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            


            if (!extension_loaded("curl")) {
                die("enable library curl first");
            }
              
              $yearAndFee = "10" . "|" . "123";
              $url = "http://127.0.0.1:8080/api/discountCalculator/$yearAndFee";   
              
              $curl = curl_init($url);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              $response = curl_exec($curl);   
              curl_close($curl);
              
              echo "real fee: $response";

            



            //

              $sql ="UPDATE airwaybill SET weight=$weight,staffID = '$stfID' WHERE airWaybillNo=$billNumber";
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              $date = date('Y-m-d H:i:s');
              $sql ="INSERT INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime, currentLocation) VALUES ('$billNumber',2,'$date','HongKong');";  /// 加staffID? create in airWaybillNo??
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              echo "<script type='text/javascript'>
              alert('Verify successful');
              window.location.href = 'verifyHTML.php';
              </script>";
        }
        mysqli_free_result($rs);
        mysqli_close($conn);
    }

}
?>
