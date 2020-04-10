<?php
require_once('../../src/maquina/functions.php'); 

if (isset($_GET['snum'])){
    delete($_GET['snum']);
} else {
    die("ERRO: Máquina não definida.");
}
?>