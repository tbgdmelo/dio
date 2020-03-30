<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/peca/findallpeca.php');
require_once('../../database/peca/findpeca.php');
require_once('../../database/peca/insertpeca.php');
require_once('../../database/peca/removepeca.php');
require_once('../../database/peca/updatepeca.php');
require_once('../../database/tipopeca/nomestipospecas.php');

$pecas = null;
$peca = null;
$tipos = null;

/**
 *  Listagem de peca
 */
function index() {
	global $pecas;
	$pecas = find_all('peca');
}

/**
 * Listagem de todos os tipos de peca
 */
function listTipos(){
  global $tipos;
  $tipos = find_all('tipo_peca');
}

/**
 *  Cadastro de peca
 */
function add() {
  
  if (!empty($_POST['peca'])) {
    
    $peca = $_POST['peca'];
    save('peca', $peca);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de peca
 */
function edit() {
  if (isset($_GET['id_peca'])) {

    $id_peca = $_GET['id_peca'];

    if (isset($_POST['peca'])) {

      $peca = $_POST['peca'];

      update('peca', $id_peca, $peca);
      header('location: index.php');
    } else {

      global $peca;
      $peca = find('peca', $id_peca);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um peca
 */
function view($id_peca = null) {
  global $peca;
  $peca = find('peca', $id_peca);
}

/**
 *  Exclusão de um peca
 */
function delete($id_peca = null) {

  global $peca;
  $peca = remove('peca', $id_peca);

  header('location: index.php');
}
/**
 * Buscar as informações pelo ID
 */
function translateTipo($id){
  global $nameTipo;
  $nameTipo = nomesTipos($id);
}