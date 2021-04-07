<?php

function hitungDenda($tglHarusKembali, $tglKembali){
    $tgl1 = explode("-", $tglHarusKembali);
    $dd1 = $tgl1[2];
    $mm1 = $tgl1[1];
    $yyyy1 = $tgl1[0];

    $tgl2 = explode("-", $tglKembali);
    $dd2 = $tgl2[2];
    $mm2 = $tgl2[1];
    $yyyy2 = $tgl2[0];

    $hr1 = gregoriantojd($mm1, $dd1, $yyyy1);
    $hr2 = gregoriantojd($mm2, $dd2, $yyyy2);

    $selisihHari = $hr2 - $hr1;

    $denda = $selisihHari * 3000;

    return $denda;
}

echo "Besarnya denda adalah: Rp.".hitungDenda("2021-01-03", "2021-01-05");

?>