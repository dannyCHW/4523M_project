<?php
      $billNumber  = $_POST['billno'];
      require_once('connectDB.php');
      $sql = "DELETE FROM airwaybilldeliveryrecord WHERE airWaybillNo = $billNumber;";
      mysqli_query($conn, $sql)or die(mysqli_error($conn));
      $sql = "DELETE FROM airwaybill WHERE airWaybillNo = $billNumber;";
      mysqli_query($conn, $sql)or die(mysqli_error($conn));
      echo "<script type='text/javascript'>
      alert('Delete successful.');
      window.location.href = 'cancelHTML.php';
      </script>";

 ?>
