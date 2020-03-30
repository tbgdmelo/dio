<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/fabricantefiltro/findallfabricantefiltro.php');
require_once('../../database/fabricantefiltro/findfabricantefiltro.php');
require_once('../../database/fabricantefiltro/insertfabricantefiltro.php');
require_once('../../database/fabricantefiltro/removefabricantefiltro.php');
require_once('../../database/fabricantefiltro/updatefabricantefiltro.php');


$fabricantesfiltro = null;
$fabricantefiltro = null;

/**
 *  Listagem de Fabricantes de Filtro
 */
function index() {
	global $fabricantesfiltro;
	$fabricantesfiltro = find_all('fabricante_filtro');
}

/**
 *  Cadastro de Fabricantes de Filtro
 */
function add() {
  
  if (!empty($_POST['fabricantefiltro'])) {
    
    $fabricantefiltro = $_POST['fabricantefiltro'];
    save('fabricante_filtro', $fabricantefiltro);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de Fabricante de Filtro
 */
function edit() {
  if (isset($_GET['id_fabfiltro'])) {

    $id_fabfiltro = $_GET['id_fabfiltro'];

    if (isset($_POST['fabricantefiltro'])) {

      $fabricantefiltro = $_POST['fabricantefiltro'];

      update('fabricante_filtro', $id_fabfiltro, $fabricantefiltro);
      header('location: index.php');
    } else {

      global $fabricantefiltro;
      $fabricantefiltro = find('fabricante_filtro', $id_fabfiltro);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Fabricante de Filtro
 */
function view($id_fabfiltro = null) {
  global $fabricantefiltro;
  $fabricantefiltro = find('fabricante_filtro', $id_fabfiltro);
}

/**
 *  Exclusão de um Fabricante de Filtro
 */
function delete($id_fabfiltro = null) {

  global $fabricantefiltro;
  $fabricantefiltro = remove('fabricante_filtro', $id_fabfiltro);

  header('location: index.php');
}
