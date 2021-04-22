<?php

//buka file
$namaFile = "datamhs.dat";
$myFile = fopen($namaFile, "a") or die("Tidak bisa membuka file!");

//baca input
$nim1 = $_POST['nim'];
$nama1 = $_POST['nama'];
$tgllahir1 = $_POST['tgllahir'];
$tmplahir1 = $_POST['tmptlhr'];

//hasil
fwrite($myFile, "\n".$nim1."|".$nama1."|".$tgllahir1."|".$tmplahir1."");
fclose($myFile);

echo "Sukses menambahkan data";
?>