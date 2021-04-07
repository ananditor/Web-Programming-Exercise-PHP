<?php

function hitungGaji($gol, $masaKerja){
  if($gol=="A"){
    if ($masaKerja <10){
      $gaji=5000000;
    }
    else{
      $gaji=7000000;
    }
  }

  else if ($gol=="B"){
    if ($masaKerja <10){
      $gaji=6000000;
    }
    else{
      $gaji=8000000;
    }
  }
  return $gaji;
}
echo "Gaji golongan A dengan masa kerja 7 tahun sebesar Rp.".hitungGaji("A", 7);

echo ", sedangkan Gaji golongan B dengan masa kerja 13 tahun sebesar Rp.".hitungGaji("B", 13);

?>