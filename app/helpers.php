<?php

use Illuminate\Support\Carbon;

function parse($fecha)
{
    return Carbon::parse($fecha);
}

function monto_cuota($monto, $cuotas)
{
    return moneda_chilena(round($monto / $cuotas, 2));
}

function moneda_chilena($numero){
    $numero = (string)$numero;
    $puntos = floor((strlen($numero)-1)/3);
    $tmp = "";
    $pos = 1;
    for($i=strlen($numero)-1; $i>=0; $i--){
    $tmp = $tmp.substr($numero, $i, 1);
    if($pos%3==0 && $pos!=strlen($numero))
    $tmp = $tmp.".";
    $pos = $pos + 1;
    }
    $formateado = "$ ".strrev($tmp);
    return $formateado;
    
}