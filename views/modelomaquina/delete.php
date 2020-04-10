<?php
require_once('../../src/modelomaquina/functions.php'); 

if (isset($_GET['id_modelo'])){
    delete($_GET['id_modelo']);
} else {
    die("ERRO: Modelo não definido.");
}
?>