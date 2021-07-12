
<?php 
if(isset($_POST['submit'])){
    $email = $_POST['cusEmail'];
    $pwd = $_POST['cusPassword'];
    require_once('connectDB.php');
    $sql = "SELECT customerEmail, customerPassword FROM customer WHERE customerEmail='$email'";
    $rs = mysqli_query($conn, $sql)or die(mysqli_error($conn));
    if(mysqli_num_rows($rs) <= 0){
        echo "<script type='text/javascript'>
        alert('Invaild! User does not exist.');
        window.location.href = 'indexHtml.php';
        </script>";
        
    } else {
        $rc = mysqli_fetch_assoc($rs);

        if($rc['customerEmail'] != $email || $rc['customerPassword'] != $_POST['cusPassword']){
            echo "<script type='text/javascript'>
            alert('Wrong email or password');
            window.location.href = 'indexHtml.php';
            </script>";
            //echo $rc['customerEmail']," | ", $rc['customerPassword']," | ", $email," | ", $_POST['cusPassword'];

        } else {
            echo "<h1>Hello $rc[customerEmail]</h1>";
            session_start();
            $_SESSION['customerEmail'] = $email;
            echo "<script type='text/javascript'>
            alert('Login');
            window.location.href = 'indexHtml.php';
            </script>";

        }
        
        
    }


} else {
    echo"alert('Something wrong');";
}

echo"window.location.href = 'indexHtml.php';";

?>  