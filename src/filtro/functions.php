<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/filtro/findallfiltro.php');
require_once('../../database/filtro/findfiltro.php');
require_once('../../database/filtro/insertfiltro.php');
require_once('../../database/filtro/removefiltro.php');
require_once('../../database/filtro/updatefiltro.php');
require_once('../../database/fabricantefiltro/nomesfabricantefiltro.php');


$filtros = null;
$filtro = null;
$fabricantes = null;

/**
 *  Listagem de Filtro
 */
function index() {
	global $filtros;
	$filtros = find_all('filtro');
}

/**
 * Listagem de todos os fabricantes de filtro
 */
function listFabricantes(){
  global $fabricantes;
  $fabricantes = find_all('fabricante_filtro');
}

/**
 *  Cadastro de Filtro
 */
function add() {
  
  if (!empty($_POST['filtro'])) {
    
    $filtro = $_POST['filtro'];
    save('filtro', $filtro);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de Filtro
 */
function edit() {
  if (isset($_GET['id_filtro'])) {

    $id_filtro = $_GET['id_filtro'];

    if (isset($_POST['filtro'])) {

      $filtro = $_POST['filtro'];

      update('filtro', $id_filtro, $filtro);
      header('location: index.php');
    } else {

      global $filtro;
      $filtro = find('filtro', $id_filtro);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um Filtro
 */
function view($id_filtro = null) {
  global $filtro;
  $filtro = find('filtro', $id_filtro);
}

/**
 *  Exclusão de um Filtro
 */
function delete($id_filtro = null) {

  global $filtro;
  $filtro = remove('filtro', $id_filtro);

  header('location: index.php');
}

/**
 * Buscar as informações pelo ID
 */
function translateFabricantesF($id){
  global $nameFab;
  $nameFab = nomesFabF($id);
}