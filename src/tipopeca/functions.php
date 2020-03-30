<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/tipopeca/findalltipopeca.php');
require_once('../../database/tipopeca/findtipopeca.php');
require_once('../../database/tipopeca/inserttipopeca.php');
require_once('../../database/tipopeca/removetipopeca.php');
require_once('../../database/tipopeca/updatetipopeca.php');
require_once('../../database/tipopeca/nomestipospecas.php');


$tipopecas = null;
$tipopeca = null;
/**
 *  Listagem de tipopeca
 */
function index() {
	global $tipopecas;
	$tipopecas = find_all('tipo_peca');
}

/**
 *  Cadastro de tipopeca
 */
function add() {
  
  if (!empty($_POST['tipopeca'])) {
    
    $tipopeca = $_POST['tipopeca'];
    save('tipo_peca', $tipopeca);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de tipopeca
 */
function edit() {
  if (isset($_GET['id_tipo'])) {

    $id_tipo = $_GET['id_tipo'];

    if (isset($_POST['tipopeca'])) {

      $tipopeca = $_POST['tipopeca'];

      update('tipo_peca', $id_tipo, $tipopeca);
      header('location: index.php');
    } else {

      global $tipopeca;
      $tipopeca = find('tipo_peca', $id_tipo);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um tipopeca
 */
function view($id_tipo = null) {
  global $tipopeca;
  $tipopeca = find('tipo_peca', $id_tipo);
}

/**
 *  Exclusão de um tipopeca
 */
function delete($id_tipo = null) {

  global $tipopeca;
  $tipopeca = remove('tipo_peca', $id_tipo);

  header('location: index.php');
}