<!--if accept -> create record , change Weight -->
<?php
include 'staffLoginSession.php';

  if(isset($_POST['update'])){
    $billNo = $_POST['billNumber'];
    $newestStatus = $_POST['input_status'];
    $newestLocation = $_POST['input_location'];
    require_once('connectDB.php');
    if($newestStatus != "In Transit" || $newestStatus != "Delivering" || $newestStatus != "Completed" || $newestLocation != "China Shanghao" || $newestLocation != "Japan"  || $newestLocation != "Australia")
    echo "<script type='text/javascript'>
    alert('You need to insert defalut value in the text box list.');
    window.location.href = 'updateHTML.php';
    </script>";
  }
?>
