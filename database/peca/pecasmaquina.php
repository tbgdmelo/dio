<?php

require_once('../../config/config.php');
require_once(DBAPI);
/**
 * Buscar nome das peças de uma máquina específica
 */
function nomesPecasMaquina($id = null){
  $database = open_database();

  $sql = "SELECT peca.nome AS nomes FROM (SELECT peca_maquina.id_peca FROM peca_maquina JOIN peca WHERE peca.id_peca = peca_maquina.id_peca AND peca_maquina.serial_maquina = " . "'".$id."'" .") AS tb1 JOIN peca WHERE peca.id_peca = tb1.id_peca";

  $result=mysqli_query($database, $sql);
  $data = mysqli_fetch_assoc($result);
  return $data['nomes']; 
}