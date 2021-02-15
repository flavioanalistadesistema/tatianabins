<?php
$con = mysql_connect("179.188.16.39","tatybinns","MeuBebeG12T");
$bd= mysql_select_db("tatybinns", $con);

if (!$con) {
	die("Erro banco" . mysql_error());
}
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_conection=utf8');
mysql_query('SET character_set_cliente=utf8');
mysql_query('SET character_set_results=utf8');
?>