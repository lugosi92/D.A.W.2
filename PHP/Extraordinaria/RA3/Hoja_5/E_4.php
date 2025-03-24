<?php

//A-------- Orden natural

$negativos = array('-5','3','-2','0','-1000','9','1');

natsort($negativos);
print_r($negativos);

//B-------- Orden natural

$ceros = array('09', '8', '10', '009', '011', '0');

natsort($ceros);
print_r($ceros);

