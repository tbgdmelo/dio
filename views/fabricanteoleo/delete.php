<?php
require_once('../../src/fabricanteoleo/functions.php'); 

if (isset($_GET['id_faboleo'])){
    delete($_GET['id_faboleo']);
} else {
    die("ERRO: Fabricante não definido.");
}
?>