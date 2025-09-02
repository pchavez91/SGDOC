<?php
/* $apiUrl = 'http://mindicador.cl/api';
//Es necesario tener habilitada la directiva allow_url_fopen para usar file_get_contents
if ( ini_get('allow_url_fopen') ) {
    $json = file_get_contents($apiUrl);
} else {
    //De otra forma utilizamos cURL
    $curl = curl_init($apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json = curl_exec($curl);
    curl_close($curl);
}
 
$dailyIndicators = json_decode($json);

$uf=$dailyIndicators->uf->valor;
$dolar=$dailyIndicators->dolar->valor;
$euro=$dailyIndicators->euro->valor;
$ipc=$dailyIndicators->ipc->valor;
$utm=$dailyIndicators->utm->valor; */

// opcion 2

/* $JsonSource = "http://indicadoresdeldia.cl/webservice/indicadores.json";
$json = json_decode(file_get_contents($JsonSource));

$uf=   $json->indicador->uf;
$dolar=$json->moneda->dolar;
$euro= $json->moneda->euro;
$ipc=  $json->indicador->ipc;
$utm=  $json->indicador->utm; */

$uf='$25957.91';
$dolar='$692.52';
$euro='$783.75';
$ipc='0.3';
$utm='$45.497,00';

/* echo $json->santoral->ayer;
echo $json->santoral->hoy;
echo $json->santoral->maniana;
echo $json->moneda->dolar_clp; //Dolar interbancario
echo $json->indicador->ivp;
echo $json->indicador->uf;
echo $json->indicador->imacec;
echo $json->bolsa->ipsa;
echo $json->bolsa->igpa;
echo $json->bolsa->banca;
echo $json->bolsa->commodities;
echo $json->bolsa->retail;
echo $json->bolsa->consumo;
echo $json->bolsa->utilities; */

?>