<!--if accept -> create record , change Weight -->
<?php
include 'staffLoginSession.php';

  if(isset($_POST['update'])){
    $billNo = $_POST['billNumber'];
    $newestStatus = $_POST['input_status'];
    $newestLocation = $_POST['input_location'];
    require_once('connectDB.php');
     if( ( $newestStatus == "Delivering" || $newestStatus == "Completed") && ($newestLocation == "China Shanghai" || $newestLocation == "Japan"  || $newestLocation == "Australia") || ($newestStatus != "In Transit" && $newestLocation == "")){
        //轉換
        if($newestStatus == "In Transit"){
          $int_status = 3;
        }else if($newestStatus == "Delivering"){
          $int_status = 4;
        }else if($newestStatus == "Completed"){
          $int_status = 5;
        }

        if ($newestLocation == "China Shanghai"){
          $int_location = 1;
        }else if ($newestLocation == "Japan"){
          $int_location = 2;
        }else if ($newestLocation == "Australia"){
          $int_location = 3;
        }
  // end
        require_once('connectDB.php');
        $sql = "SELECT deliveryStatusID FROM airwaybilldeliveryrecord WHERE airWaybillNo = $billNo order by airWaybillDeliveryRecordID DESC LIMIT 1;";
        $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));

        if(mysqli_num_rows($rs) <= 0){

          $rc = mysqli_fetch_assoc($rs);
          $date = date('Y-m-d H:i:s');

          if($int_status == 3 && $rc['deliveryStatusID'] == 2){
            $sql = "INSERT  INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime, currentLocation) VALUES ('$billNo',3,'$date','HongKong');";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
            echo "<script type='text/javascript'>
            alert('Update to In Transit successful');
            window.location.href = 'updateHTML.php';
            </script>";
          }else if($int_status == 4 && $rc['deliveryStatusID'] == 3){
          $sql = "INSERT  INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime, currentLocation) VALUES ('$billNo',4,'$date','$newestLocation');";
            $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
          }else if($int_status == 5 && $rc['deliveryStatusID'] == 4){
              $sql = "SELECT locationID FROM airwaybill WHERE airWaybillNo = $billNo;";
              $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              $rc = mysqli_fetch_assoc($rs);
              $locationID = $rc['locationID'];
              if($int_location == $locationID){
                $sql = "INSERT  INTO airwaybilldeliveryrecord (airWaybillNo, deliveryStatusID, recordDateTime, currentLocation) VALUES ('$billNo',5,'$date','$newestLocation');";
                $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
              }else{
                echo "<script type='text/javascript'>
                alert('You cannot Completed this order, the location is not match.');
                window.location.href = 'updateHTML.php';
                </script>";
              }
          }else{
            echo "<script type='text/javascript'>
            alert('Please check the order number and status, this order is not allow changing like this.');
            window.location.href = 'updateHTML.php';
            </script>";
          }

      }else{
        echo "<script type='text/javascript'>
        alert('Cannot found this order, please check the order number that you input.');
        window.location.href = 'updateHTML.php';
        </script>";
      }
    }else{
      echo "<script type='text/javascript'>
      alert('You need to insert defalut value in the text box list.');
      window.location.href = 'updateHTML.php';
      </script>";
  }
}
?>
