<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/fabricanteoleo/findallfabricanteoleo.php');
require_once('../../database/fabricanteoleo/findfabricanteoleo.php');
require_once('../../database/fabricanteoleo/insertfabricanteoleo.php');
require_once('../../database/fabricanteoleo/removefabricanteoleo.php');
require_once('../../database/fabricanteoleo/updatefabricanteoleo.php');


$fabricantesoleo = null;
$fabricanteoleo = null;

/**
 *  Listagem de Fabricantes de oleo
 */
function index() {
	global $fabricanteoleo;
	$fabricantesoleo = find_all('fabricante_oleo');
}

/**
 *  Cadastro de Fabricantes de oleo
 */
function add() {
  
  if (!empty($_POST['fabricanteoleo'])) {
    
    $fabricanteoleo = $_POST['fabricanteoleo'];
    save('fabricante_oleo', $fabricanteoleo);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de Fabricante de oleo
 */
function edit() {
  if (isset($_GET['id_faboleo'])) {

    $id_faboleo = $_GET['id_faboleo'];

    if (isset($_POST['fabricanteoleo'])) {

      $fabricanteoleo = $_POST['fabricanteoleo'];

      update('fabricante_oleo', $id_faboleo, $fabricanteoleo);
      header('location: index.php');
    } else {

      global $fabricanteoleo;
      $fabricanteoleo = find('fabricante_oleo', $id_faboleo);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Fabricante de oleo
 */
function view($id_faboleo = null) {
  global $fabricanteoleo;
  $fabricanteoleo = find('fabricante_oleo', $id_faboleo);
}

/**
 *  Exclusão de um Fabricante de oleo
 */
function delete($id_faboleo = null) {

  global $fabricanteoleo;
  $fabricanteoleo = remove('fabricante_oleo', $id_faboleo);

  header('location: index.php');
}
