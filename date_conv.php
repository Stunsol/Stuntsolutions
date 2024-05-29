<?php
    if(DATE('D', strtotime($tg)) == "Sun"){
        $d = "Minggu";
    } else if(DATE('D', strtotime($tg)) == "Mon"){
        $d = "Senin";
    } else if(DATE('D', strtotime($tg)) == "Tue"){
        $d = "Selasa";
    } else if(DATE('D', strtotime($tg)) == "Wed"){
        $d = "Rabu";
    } else if(DATE('D', strtotime($tg)) == "Thu"){
        $d = "Kamis";
    } else if(DATE('D', strtotime($tg)) == "Fri"){
        $d = "Jumat";
    } else if(DATE('D', strtotime($tg)) == "Sat"){
        $d = "Sabtu";
    }

    if(DATE('m', strtotime($tg)) == "1"){
        $m = "Januari";
    } else if(DATE('m', strtotime($tg)) == "2"){
        $m = "Februari";
    } else if(DATE('m', strtotime($tg)) == "3"){
        $m = "Maret";
    } else if(DATE('m', strtotime($tg)) == "4"){
        $m = "April";
    } else if(DATE('m', strtotime($tg)) == "5"){
        $m = "Mei";
    } else if(DATE('m', strtotime($tg)) == "6"){
        $m = "Juni";
    } else if(DATE('m', strtotime($tg)) == "7"){
        $m = "Juli";
    } else if(DATE('m', strtotime($tg)) == "8"){
        $m = "Agustus";
    } else if(DATE('m', strtotime($tg)) == "9"){
        $m = "September";
    } else if(DATE('m', strtotime($tg)) == "10"){
        $m = "Oktober";
    } else if(DATE('m', strtotime($tg)) == "11"){
        $m = "November";
    } else if(DATE('m', strtotime($tg)) == "12"){
        $m = "Desember";
    }
    if($sts == 0){
        $tanggal = DATE('d', strtotime($tg))." ".$m." ".DATE('Y', strtotime($tg));
    } else if($sts == 1){
        $tanggal = $d.", ".DATE('d', strtotime($tg))." ".$m." ".DATE('Y', strtotime($tg));
    }
?>