<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/planomanutencao/findallplanomanutencao.php');
require_once('../../database/planomanutencao/findplanomanutencao.php');
require_once('../../database/planomanutencao/insertplanomanutencao.php');
require_once('../../database/planomanutencao/removeplanomanutencao.php');
require_once('../../database/planomanutencao/updateplanomanutencao.php');
require_once('../../database/turno/nomesturno.php');
require_once('../../database/maquina/nomesmaquina.php');


$planosmanutencao = null;
$planomanutencao = null;
$turnos = null;
$maquinas = null;

/**
 *  Listagem de plano de manutencao
 */
function index() {
	global $planosmanutencao;
	$planosmanutencao = find_all('plano_manutencao');
}

/**
 * Listagem de todos os turnos
 */
function listTurnos(){
  global $turnos;
  $turnos = find_all('turno');
}

/**
 * Listagem de todas as máquinas
 */
function listMaquinas(){
    global $maquinas;
    $maquinas = find_all('maquina');
  }

/**
 *  Cadastro de plano de manutencao
 */
function add() {
  
  if (!empty($_POST['planomanutencao'])) {
    
    $planomanutencao = $_POST['planomanutencao'];
    save('plano_manutencao', $planomanutencao);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de plano de manutencao
 */
function edit() {
  if (isset($_GET['id_plano'])) {

    $id_plano = $_GET['id_plano'];

    if (isset($_POST['planomanutencao'])) {

      $planomanutencao = $_POST['planomanutencao'];

      update('plano_manutencao', $id_plano, $planomanutencao);
      header('location: index.php');
    } else {

      global $planomanutencao;
      $planomanutencao = find('plano_manutencao', $id_plano);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um plano de manutencao
 */
function view($id_plano = null) {
  global $planomanutencao;
  $planomanutencao = find('plano_manutencao', $id_plano);
}

/**
 *  Exclusão de um plano de manutencao
 */
function delete($id_plano = null) {

  global $planomanutencao;
  $planomanutencao = remove('plano_manutencao', $id_plano);

  header('location: index.php');
}

/**
 * Buscar as informações pelo ID
 */
function translatePlano($id_turno, $serial_maq){
  global $nameTurno;
  global $nameMaq;
  $nameTurno = nomesTurno($id_turno);
  $nameMaq = nomesMaq($serial_maq);
}