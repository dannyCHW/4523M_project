
<?php
if(isset($_POST['submit'])){
    $staffID  = $_POST['staffID'];
    $pwd = $_POST['staffPassword'];
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

        if($rc['staffID'] != $staffID || $rc['staffPassword'] != $pwd){
            // echo "<script type='text/javascript'>
            // alert('Wrong email or password');
            // window.location.href = 'loginHtml.php';
            // </script>";
            echo $rc['staffID']," | ", $rc['staffPassword'];

        } else {
            echo "<h1>Hello $rc[staffName]</h1>";
            session_start();
            $_SESSION['customerEmail'] = $email;

            echo "<script type='text/javascript'>
            alert('Login');
            window.location.href = 'loginHtml.php';
            </script>";

        }


    }


} else {
    echo'on99';
}

?>
