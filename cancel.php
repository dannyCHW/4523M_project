<?php
  include 'cancelHTML.php';
  include 'connectDB.php';
    if(isset($_POST['search'])){
      $billNo = $_POST['billNumber'];
      require_once('connectDB.php');
      $sql = "SELECT * FROM airwaybill ";
      $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
      $rc = mysqli_fetch_assoc($rs);
      echo"<form method='post' action='cancel2.php'><table class='content-table'><thead>
              <tr>
            <th>Bill NO</th><th>Sender's Email</th><th>Receiver Name</th><th>Receiver Phone</th><th>Receiver Address</th><th>Location ID</th><th>Date</th><th>Weight</th><th>Total Price</th><th>Control</th>
              </tr>
          <tbody>";
      while($rc = mysqli_fetch_array($rs)){
        if($rc['airWaybillNo'] == $billNo){
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><button class='btnDelete' onclick='deleteValue($billNo)'>X</button></td></tr>",$rc['airWaybillNo'],$rc['customerEmail'],$rc['receiverName'],$rc['receiverPhoneNumber'],$rc['receiverAddress'],$rc['locationID'],$rc['date'],$rc['weight'],$rc['totalPrice']);
      }
    }
    echo '</tbody></thead></table><input type="hidden" name="billno" id="billno" value="" /></form>';
    mysqli_free_result($rs);
    mysqli_close($conn);
}
?>
<script>
      function deleteValue(number) {
                document.getElementById('billno').value = number;
                document.forms[0].submit();
}
</script>
