<?php
session_start();
include("connexion.php");

if (isset($_GET['deconnect'])) {

session_destroy();
$_SESSION = array();
header('Location:index.php?deconnected');
exit();
}
?>