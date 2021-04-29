<?php

$users = [
  ["username1", "anandito", "00"],
];

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  foreach ($users as $profile_user) {
    if(($profile_user[0] == $username) && ($profile_user[2] == $password)){
      setcookie('namauser', $profile_user[1], time()+3*30*24*3600,"/");
      header("Location: page1.php");
    }
  }
  echo "<h3>Login gagal</h3>";
  echo "<p>Silahkan <a href='form.html'>Login Kembali</a></p>";
}

?>