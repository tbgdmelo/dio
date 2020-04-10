<?php
require_once('../../src/peca/functions.php'); 

if (isset($_GET['id_peca'])){
    delete($_GET['id_peca']);
} else {
    die("ERRO: Peça não definida.");
}
?>