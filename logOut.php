<?php 
    session_start();
    if($_SESSION['customerEmail'] != null)
    {
        unset($_SESSION['customerEmail']);
    }

    echo "<script type='text/javascript'>
            alert('Log Out');
            window.location.href = 'indexHtml.php';
            </script>";
?>