<?php
require_once('../../src/fabricantefiltro/functions.php'); 

if (isset($_GET['id_fabfiltro'])){
    delete($_GET['id_fabfiltro']);
} else {
    die("ERRO: Fabricante não definido.");
}
?>