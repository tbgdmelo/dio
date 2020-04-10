<?php
require_once('../../src/tipolubrificacao/functions.php'); 

if (isset($_GET['id_lubrificacao'])){
    delete($_GET['id_lubrificacao']);
} else {
    die("ERRO: Tipo de Lubrificação não definido.");
}
?>