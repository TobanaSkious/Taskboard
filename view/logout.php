<?php
include_once "../controllers/register.php";
$obj->logout();
header('Location: registre.php');
exit;
?>