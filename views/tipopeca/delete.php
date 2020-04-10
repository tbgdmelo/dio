<?php
require_once('../../src/tipopeca/functions.php'); 

if (isset($_GET['id_tipo'])){
    delete($_GET['id_tipo']);
} else {
    die("ERRO: Tipo de Peça não definido.");
}
?>