<?php
require_once('../../src/filtro/functions.php'); 

if (isset($_GET['id_filtro'])){
    delete($_GET['id_filtro']);
} else {
    die("ERRO: Filtro não definido.");
}
?>