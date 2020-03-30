<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/oleo/findalloleo.php');
require_once('../../database/oleo/findoleo.php');
require_once('../../database/oleo/insertoleo.php');
require_once('../../database/oleo/removeoleo.php');
require_once('../../database/oleo/updateoleo.php');
require_once('../../database/fabricanteoleo/nomesfabricanteoleo.php');

$oleos = null;
$oleo = null;
$fabricantes = null;

/**
 *  Listagem de oleo
 */
function index() {
	global $oleos;
	$oleos = find_all('oleo');
}

/**
 * Listagem de todos os fabricantes de oleo
 */
function listFabricantes(){
  global $fabricantes;
  $fabricantes = find_all('fabricante_oleo');
}

/**
 *  Cadastro de oleo
 */
function add() {
  
  if (!empty($_POST['oleo'])) {
    
    $oleo = $_POST['oleo'];
    save('oleo', $oleo);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de oleo
 */
function edit() {
  if (isset($_GET['id_oleo'])) {

    $id_oleo = $_GET['id_oleo'];

    if (isset($_POST['oleo'])) {

      $oleo = $_POST['oleo'];

      update('oleo', $id_oleo, $oleo);
      header('location: index.php');
    } else {

      global $oleo;
      $oleo = find('oleo', $id_oleo);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um oleo
 */
function view($id_oleo = null) {
  global $oleo;
  $oleo = find('oleo', $id_oleo);
}

/**
 *  Exclusão de um oleo
 */
function delete($id_oleo = null) {

  global $oleo;
  $oleo = remove('oleo', $id_oleo);

  header('location: index.php');
}

/**
 * Busca os fabricantes pelo ID
 */
function translateFaboleo($id){
  global $nameFaboleo;
  $nameFaboleo = nomesFaboleo($id);
}