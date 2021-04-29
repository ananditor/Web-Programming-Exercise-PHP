<?php

if (isset($_POST['submit'])) {
  if (!isset($_COOKIE['angka'])) {
    $angkaRandom = rand(0, 100);
    setcookie('angka', $angkaRandom, time() + 3 * 30 * 24 * 3600, "/");
    header("Location: tebakangka.php");
  }
  if (isset($_COOKIE['angka'])) {
    if ($_POST['tebak'] == $_COOKIE['angka']) {
      echo "<p>Selamat ya... Anda Benar, saya telah memilih bilangan " . $_POST['tebak'] . "</p>";
      setcookie('angka', '', -1, "/");
      echo "<a href='tebakangka.php'>ulangi lagi</a>";
    } elseif ($_POST['tebak'] < $_COOKIE['angka']) {
?>
      <h1>Welcome to Tebak angka</h1>
      <p>Hallo, nama saya Mr. PHP.</p>
      <p>Saya telah memilih secara random sebuah bilangan bulat. Silahkan Anda menebak ya!</p>
      <p>Waaah... masih salah ya, bilangan tebakan Anda terlalu tinggi.</p>
      <form action="tebakangka.php" method="POST">
        <label for="tebak">
          Bilangan tebakan Anda
        </label>
        <input type="text" name="tebak" id="tebak">
        <input type="submit" name="submit" value="Submit">
      </form>
    <?php
    } elseif ($_POST['tebak'] > $_COOKIE['angka']) {
    ?>
      <h1>Welcome to Tebak angka</h1>
      <p>Hallo, nama saya Mr. PHP.</p>
      <p>Saya telah memilih secara random sebuah bilangan bulat. Silahkan Anda menebak ya!</p>
      <p>Waaah... masih salah ya, bilangan tebakan Anda terlalu rendah.</p>
      <form action="tebakangka.php" method="POST">
        <label for="tebak">
          Bilangan tebakan Anda
        </label>
        <input type="text" name="tebak" id="tebak">
        <input type="submit" name="submit" value="Submit">
      </form>
    <?php
    }
    ?>
  <?php
  } else {
  ?>
    <h1>Welcome to Tebak angka</h1>
    <p>Hallo, nama saya Mr. PHP.</p>
    <p>Saya telah memilih secara random sebuah bilangan bulat. Silahkan Anda menebak ya!</p>
    <form action="tebakangka.php" method="POST">
      <label for="tebak">
        Bilangan tebakan Anda
      </label>
      <input type="text" name="tebak" id="tebak">
      <input type="submit" name="submit" value="Submit">
    </form>
  <?php
  }
} else {
  ?>
  <h1>Welcome to Tebak angka</h1>
  <p>Hallo, nama saya Mr. PHP.</p>
  <p>Saya telah memilih secara random sebuah bilangan bulat. Silahkan Anda menebak ya!</p>
  <form action="tebakangka.php" method="POST">
    <label for="tebak">
      Bilangan tebakan Anda
    </label>
    <input type="text" name="tebak" id="tebak">
    <input type="submit" name="submit" value="Submit">
  </form>
<?php
}

?>