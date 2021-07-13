
<?php
if(isset($_POST['submit'])){
    $staffID  = $_POST['staffID'];
    $stfpwd = $_POST['staffPassword'];
    require_once('connectDB.php');
    $sql = "SELECT staffID, staffPassword,staffName FROM staff WHERE staffID='$staffID'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){
        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'staffLoginHTML.php';
        </script>";

    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['staffID'] != $staffID || $rc['staffPassword'] != $stfpwd){
            // echo "<script type='text/javascript'>
            // alert('Wrong email or password');
            // window.location.href = 'loginHtml.php';
            // </script>";
            echo "<script type='text/javascript'>
            alert('Wrong ID or password, please input again');
            window.location.href = 'staffLoginHTML.php';
            </script>";

        } else {
            echo "<h1>Hello $rc[staffName]</h1>";
            session_start();
            $_SESSION['staffID'] = $staffID;

            echo "<script type='text/javascript'>
            alert('Login');
            window.location.href = 'verifyHTML.php';
            </script>";

        }


    }


} else {
    echo'on99';
}

?>
