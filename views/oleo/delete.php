<?php
require_once('../../src/oleo/functions.php'); 

if (isset($_GET['id_oleo'])){
    delete($_GET['id_oleo']);
} else {
    die("ERRO: Óleo não definido.");
}
?>