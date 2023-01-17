<?php
include_once 'model.php';
include_once 'LoginDB.php';
$log = new LoginDB();
//$result=$log->getOne2("nomCat", "Game of the Year", "juego", "eldenRing");

$result = $log->getOne1("user","Papo");
//$result = $log->getAll();
echo (implode($result));
?>