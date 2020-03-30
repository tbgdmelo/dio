<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/modelomaquina/findallmodelomaquina.php');
require_once('../../database/modelomaquina/findmodelomaquina.php');
require_once('../../database/modelomaquina/insertmodelomaquina.php');
require_once('../../database/modelomaquina/removemodelomaquina.php');
require_once('../../database/modelomaquina/updatemodelomaquina.php');


$modelosmaquina = null;
$modelomaquina = null;
/**
 *  Listagem de modelo de maquina
 */
function index() {
	global $modelosmaquina;
	$modelosmaquina = find_all('modelo_maquina');
}

/**
 *  Cadastro de modelo de maquina
 */
function add() {
  
  if (!empty($_POST['modelomaquina'])) {
    
    $modelomaquina = $_POST['modelomaquina'];
    save('modelo_maquina', $modelomaquina);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de modelomaquina
 */
function edit() {
  if (isset($_GET['id_modelo'])) {

    $id_modelo = $_GET['id_modelo'];

    if (isset($_POST['modelomaquina'])) {

      $modelomaquina = $_POST['modelomaquina'];

      update('modelo_maquina', $id_modelo, $modelomaquina);
      header('location: index.php');
    } else {

      global $modelomaquina;
      $modelomaquina = find('modelo_maquina', $id_modelo);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um modelomaquina
 */
function view($id_modelo = null) {
  global $modelomaquina;
  $modelomaquina = find('modelo_maquina', $id_modelo);
}

/**
 *  Exclusão de um modelomaquina
 */
function delete($id_modelo = null) {

  global $modelomaquina;
  $modelomaquina = remove('modelo_maquina', $id_modelo);

  header('location: index.php');
}