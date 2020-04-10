<?php

require_once('../../config/config.php');
require_once(DBAPI);

function nomesPecas($id = null){
  $database = open_database();

  $sql = "SELECT nome FROM peca WHERE id_peca = " . $id;

  $result=mysqli_query($database, $sql);
  $data = mysqli_fetch_assoc($result);
  return $data['nome'];
}