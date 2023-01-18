<?php
include("gotyControlador.php");
// Miramos a ver si se indica alguna acción en la URL
if (!isset($_REQUEST['action'])) {
// No hay acción en la URL. Usamos la acción por defecto (main). Puedes
    $action = "main";
} else {
// Sí hay acción en la URL. Recuperamos su nombre.
    $action = $_REQUEST['action'];
}
// Hacemos lo mismo con el nombre del controlador
if (!isset($_REQUEST['controller'])) {
    $controlClassName = "gotyControl";
} else {
// Sí hay controlador en la URL. Recuperamos su nombre.
    $controlClassName = $_REQUEST['control'];
}
// Instanciamos el controlador e invocamos al método que se llama como la

$control = new $controlClassName();
$control->$action();
?>