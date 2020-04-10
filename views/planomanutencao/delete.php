<?php
require_once('../../src/planomanutencao/functions.php'); 

if (isset($_GET['id_plano'])){
    delete($_GET['id_plano']);
} else {
    die("ERRO: Plano não definido.");
}
?>