<?php
$namaFile = "datamhs.dat";
$myFile = fopen($namaFile, "r") or die("File tidak bisa dibuka!");

echo "<center><h1>Data Mahasiswa</h1></center>";
echo "<center>Jumlah data : ".count(file($namaFile))."</center>";

$tgl = explode("-", date("Y-m-d"));
$date = $tgl[2];
$month = $tgl[1];
$year = $tgl[0];
$jd2 = gregoriantojd($month, $date, $year);

function perhitunganUmur(String $tglLahir, $jd2){
    $tglLahir = explode("-", $tglLahir);
    $dateLahir = $tglLahir[2];
    $monthLahir = $tglLahir[1];
    $yearLahir = $tglLahir[0];
    $jd1 = gregoriantojd($monthLahir, $dateLahir, $yearLahir);
    $umur = intval(($jd2 - $jd1) / 365.25);
    return $umur;
}

echo "<center><br>";
echo "<table border='1'>";
echo("<tr>
    <th>No</th> <th>NIM</th> <th>Nama Mhs</th> <th>Tanggal Lahir</th> <th>Tempat Lahir</th> <th>Usia (Tahun)</th>
    <tr>");
$nomor = 1;
while (!feof($myFile)){
    echo("<tr>");
    $datamhs = explode("|", fgets($myFile));

    if ($datamhs[0] != ''){
        $usia = perhitunganUmur($datamhs[2], $jd2);
        echo("
            <td>$nomor</td> <td>$datamhs[0]</td> <td>$datamhs[1]</td> <td>$datamhs[2]</td> <td>$datamhs[3]</td> <td>$usia</td>");
        $nomor++;
    }
    echo("<tr>");
}
echo "<table>";
echo "<center>";

fclose($myFile);
?>