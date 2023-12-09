<?php

//Search for information in the system
$temp=shell_exec("sudo sensors");
$Dados= explode("\n", $temp);

//Process and format processor information
$processador=str_replace("CPU Temperature:", "", $Dados[10]);
$processador=str_replace("(high = +60.0 C, crit = +95.0 C)", "", $processador);
$processador=str_replace("+", "", $processador);

if(intval($processador) < 55){$situacaoprocessador='<font color=blue><b>Ideal ok</font>';}
if(intval($processador) > 54 && intval($processador) < 70){$situacaoprocessador='<font color=red><b>Temperatura Alta<img src="../imagem/temp_alta.png" align="center" width="40" height="40">';}
if(intval($processador) > 69){$situacaoprocessador='<font color=red><b>Temperatura Critica Perigo Eminente<img src="../imagem/alerta.gif" align="center" width="40" height="40">';}

$processador=str_replace(" C", "° Graus Celsius", $processador);

//Process and format motherboard information
$placamae=str_replace("MB Temperature: ", "", $Dados[11]);
$placamae=str_replace("(high = +45.0 C, crit = +75.0 C)", "", $placamae);
$placamae=str_replace("+", "", $placamae);
if(intval($placamae) < 45){$situacaoplacamae='<font color=blue><b>Ideal ok</font>';}
if(intval($placamae) > 44 && intval($placamae) < 60){$situacaoplacamae='<font color=red><b>Temperatura Alta<img src="../imagem/temp_alta.png" align="center" width="40" height="40">';}
if(intval($placamae) > 59){$situacaoplacamae='<font color=red><b>Temperatura Critica Perigo Eminente<img src="../imagem/alerta.gif" align="center" width="40" height="40">';}

$placamae=str_replace(" C", "° Graus Celsius", $placamae);

//Process and format cooler information
$cooler=str_replace("CPU FAN Speed: ", "", $Dados[6]);
$cooler=str_replace("(min =  600 RPM, max = 7200 RPM)", "", $cooler);
if(intval($cooler) > 7000 && intval($cooler) < 600){$situacaocooler='<font color=red><b>Cooler com Problemas<img src="../imagem/alerta.gif" align="center" width="40" height="40">';}
else {$situacaocooler='<font color=blue><b>Ideal ok </font>';}
$cooler=str_replace("RPM", "Rotações por Minuto", $cooler);

//Fetch information from the system about hard drives and format the information
$M2SSD=shell_exec("sudo nvme smart-log /dev/nvme0");

$Dados2= explode("\n", $M2SSD);

$M2SSD=str_replace("temperature : ", "temperature :", $Dados2[2]);

//Output of tabular formatted data
echo '
<div id=\"column4\" style=\"width:49.5%;float:left;margin-top:1%;\>
<div class="dragbox bloc rounded">
<h4> Temperature</h4>
<div class="dragbox-content"> 
<b>Processador <br/></b>    <div class="progress"> <font color=#01725e><b>'.$processador.' - '.$situacaoprocessador.'</div></font>
<b>Placa Mãe   <br/></b>    <div class="progress"> <font color=#01725e><b>'.$placamae.' - '.$situacaoplacamae.' </div></font>
<b>Cooler      <br/></b>    <div class="progress"> <font color=#01725e><b>'.$cooler.' - '.$situacaocooler.' </div></font>
<b>M2 SSD      <br/></b>    <div class="progress"> <font color=#01725e><b>'.$M2SSD.' </div></font>
</div>
</div>
</div>
';

?>

