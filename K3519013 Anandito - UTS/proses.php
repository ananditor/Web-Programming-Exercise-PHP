<?php
    session_start();
    if(isset($_POST['submit'])){
        setcookie("pemain", "{$_POST['nama']}", time() + 3600*24*30);
        $_SESSION['nyawa'] = 5;
        $_SESSION['skor'] = 0;
        $_SESSION['angka1'] = random_int(0, 20);   
        $_SESSION['angka2'] = random_int(0, 20);
        header("Location:  main.php");
    }else{
        header("Location: index.php");
    }


?>