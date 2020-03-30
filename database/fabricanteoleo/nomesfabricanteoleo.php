<?php

require_once('../../config/config.php');
require_once(DBAPI);
/**
 * Buscar nome dos modelos pelo ID
 */
function nomesFaboleo($id = null){
  $database = open_database();

  $sql = "SELECT nome FROM fabricante_oleo WHERE id_faboleo = " . $id;

  $result=mysqli_query($database, $sql);
  $data = mysqli_fetch_assoc($result);
  return $data['nome'];
}