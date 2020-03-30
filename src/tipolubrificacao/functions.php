<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/tipolubrificacao/findalltipolubrificacao.php');
require_once('../../database/tipolubrificacao/findtipolubrificacao.php');
require_once('../../database/tipolubrificacao/inserttipolubrificacao.php');
require_once('../../database/tipolubrificacao/removetipolubrificacao.php');
require_once('../../database/tipolubrificacao/updatetipolubrificacao.php');


$tipolubrificacoes = null;
$tipolubrificacao = null;
/**
 *  Listagem de tipolubrificacao
 */
function index() {
	global $tipolubrificacoes;
	$tipolubrificacoes = find_all('tipo_lubrificacao');
}

/**
 *  Cadastro de tipolubrificacao
 */
function add() {
  
  if (!empty($_POST['tipolubrificacao'])) {
    
    $tipolubrificacao = $_POST['tipolubrificacao'];
    save('tipo_lubrificacao', $tipolubrificacao);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de tipolubrificacao
 */
function edit() {
  if (isset($_GET['id_lubrificacao'])) {

    $id_lubrificacao = $_GET['id_lubrificacao'];

    if (isset($_POST['tipolubrificacao'])) {

      $tipolubrificacao = $_POST['tipolubrificacao'];

      update('tipo_lubrificacao', $id_lubrificacao, $tipolubrificacao);
      header('location: index.php');
    } else {

      global $tipolubrificacao;
      $tipolubrificacao = find('tipo_lubrificacao', $id_lubrificacao);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um tipolubrificacao
 */
function view($id_lubrificacao = null) {
  global $tipolubrificacao;
  $tipolubrificacao = find('tipo_lubrificacao', $id_lubrificacao);
}

/**
 *  Exclusão de um tipolubrificacao
 */
function delete($id_tipo = null) {

  global $tipolubrificacao;
  $tipolubrificacao = remove('tipo_lubrificacao', $id_tipo);

  header('location: index.php');
}
