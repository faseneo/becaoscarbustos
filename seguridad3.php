<?php
session_start();
if($_SESSION["autentica"] != "YEP"){
	header("Location: http://beneficios.umce.cl/becaoscarbustos/");
	exit();
}
?>