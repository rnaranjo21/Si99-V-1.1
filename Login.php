<?php
session_start();
include ("Libreria-Web-Services-Syscaf-S.A.S/client_CoreWs.php");
$Para_login = array("UserName" => $_SESSION['Usuario'], "Password" => $_SESSION['Password'], "ApplicationID" => "");
$response_login = $CoreWS->__soapCall('Login', array($Para_login));
$token = $response_login->LoginResult->Token;
$authHeader = array("Token" => $token);
//print_r($authHeader);
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
if ($token == null) {
  echo '<script languaje="javascript">';
  echo 'alert("Contraseña Incorrecta");';
  echo 'location.href = "cerrar.php";';
  echo '</script>';
}
else {
  include("TablaUbSi99.php");
}
?>