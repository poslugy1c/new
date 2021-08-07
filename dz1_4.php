<?php

echo '4. Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.';
echo '<br> <br>';


function inDiapazon($ip, $beginDiap, $endDiap)
{
    $arrIp = array();
    $triada ='';
    $numTriad =0;

    for ($i = 0; $i < strlen($ip); $i++){

        if($ip[$i] == '.'){
            $arrIp[] = (int) $triada;
            $numTriad++;
            // echo '<br> ' . (int) $triada .' / '. $numTriad;

            $bTriada ='';
            $numBeginTriad =0;
            $eTriada ='';
            $numEndTriad =0;

            for ($j = 0; $j < strlen($beginDiap); $j++){               
                if($beginDiap[$j] == '.'){
                    $numBeginTriad++;

                    if( ((int) $triada < (int)$bTriada) && $numBeginTriad == $numTriad){
                        return $ip .' not in diapazon';
                    } 

                    $bTriada = '';
                } else {
                    $bTriada = $bTriada . $beginDiap[$j];
                }
            }   

            for ($x = 0; $x < strlen($endDiap); $x++){
                
                if($endDiap[$x] == '.'){
                    $numEndTriad++;

                    if( ((int) $triada > (int)$eTriada) && $numEndTriad == $numTriad){
                        return $ip .' not in diapazon';
                    } 

                    $eTriada = '';
                } else {
                    $eTriada = $eTriada . $endDiap[$x];
                }
            }    

            $triada = '';
        }else{
            $triada = $triada . $ip[$i];
        }
    }

    $arrIp[] = (int) $triada;
    $numBeginTriad++;
    $numEndTriad++;
    $numTriad++;

    // echo '<br> ' . (int) $triada .' / '. $numTriad;
    // echo '********  ' . (int) $bTriada .' / '. $numBeginTriad;

    if( ((int) $triada < (int)$bTriada) && $numBeginTriad == $numTriad){
        return $ip .' not in diapazon';
    } 
    if( ((int) $triada > (int)$eTriada) && $numEndTriad == $numTriad){
        return $ip .' not in diapazon';
    } 

    return $ip .' in Diapazon';
}

$res =inDiapazon('192.168.1.77', '192.168.1.44', '192.168.1.255');

echo $res;
