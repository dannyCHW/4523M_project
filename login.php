
<?php 
if(isset($_POST['cusEmail'])){
    $email = $_POST['cusEmail'];
    $pwd = $_POST['cusPassword'];
    require_once('connectDB.php');
    $sql = "SELECT customerEmail, customerPassword FROM customer WHERE customerEmail='$email'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){
        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'login.html';
        </script>";
        
    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['customerEmail'] != $email || $rc['customerPassword'] != $pwd){
            echo "<h1>Wrong email or password</h1>";
            // header("Location: login.html");
            // exit();
        } else {
            echo "<h1>Hello $rc[sName]</h1>";
            session_start();
            $_SESSION['customerEmail'] = $email;
            echo 'Login';
        }
        
        
    }


} else {
    echo'on99';
}

?>  