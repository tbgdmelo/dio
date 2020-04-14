<?php

require_once('../../config/config.php');
require_once(DBAPI);
require_once('../../database/maquina/findallmaquina.php');
require_once('../../database/maquina/findmaquina.php');
require_once('../../database/maquina/insertmaquina.php');
require_once('../../database/maquina/removemaquina.php');
require_once('../../database/maquina/updatemaquina.php');
require_once('../../database/modelomaquina/nomesmodelo.php');
require_once('../../database/tipolubrificacao/nomeslubrificacao.php');
require_once('../../database/oleo/nomesoleo.php');
require_once('../../database/filtro/nomesfiltro.php');
require_once('../../database/peca/nomespeca.php');
require_once('../../database/peca/pecasmaquina.php');

$maquinas = null;
$maquina = null;
$lubrificacoes = null;
$modelos = null;
$filtros = null;
$oleos = null;
$pecas = null;
$pecamaquinas = null;
$pecamaquina = null;
$namesPecaMaq = null;

/**
 *  Listagem de maquina
 */
function index() {
	global $maquinas;
	$maquinas = find_all('maquina');
}

/**
 * Listagem de todos as lubrificacoes
 */
function listLubrificacoes(){
  global $lubrificacoes;
  $lubrificacoes = find_all('tipo_lubrificacao');
}

/**
 * Listagem de todos os modelos de maquina
 */
function listModelos(){
    global $modelos;
    $modelos = find_all('modelo_maquina');
  }

/**
 * Listagem de todos os filtros de maquina
 */
function listFiltros(){
    global $filtros;
    $filtros = find_all('filtro');
}

/**
 * Listagem de todos os oleos de maquina
 */
function listOleos(){
    global $oleos;
    $oleos = find_all('oleo');
}

/**
 * Listagem de todas as peças
 */
function listPecas(){
  global $pecas;
  $pecas = find_all('peca');
}

/**
 *  Cadastro de maquina
 */
function add() {
  
  if (!empty($_POST['maquina'])) {
    
    $maquina = $_POST['maquina'];
    save('maquina', $maquina);
    header('location: index.php');
  }
}

/**
 *  Cadastro de pecas da maquina
 */
function addPecas($snum = null) {
    global $maquina;
    $maquina = find('maquina', $snum);

  if (!empty($_POST['peca_maquina'])) {
    $peca_maquina = $_POST['peca_maquina'];
    save('peca_maquina', $peca_maquina);
    header('location: index.php');
  }
}

/**
 *	Atualizacao/Edicao de maquina
 */
function edit() {
  if (isset($_GET['snum'])) {

    $snum = $_GET['snum'];

    if (isset($_POST['maquina'])) {

      $maquina = $_POST['maquina'];

      update('maquina', $snum, $maquina);
      header('location: index.php');
    } else {

      global $maquina;
      $maquina = find('maquina', $snum);
    } 
  } else {
    header('location: index.php');
  }
}

/**
 *  Visualização de um maquina
 */
function view($snum = null) {
  global $maquina;
  $maquina = find('maquina', $snum);
}

/**
 *  Exclusão de um maquina
 */
function delete($snum = null) {

  global $maquina;
  $maquina = remove('maquina', $snum);

  header('location: index.php');
}

/**
 * Buscar as informações pelo ID
 */
function translate($id_modelo, $id_lub, $id_oleo, $id_filtro){
  global $nameMod;
  global $nameLub;
  global $nameOleo;
  global $nameFiltro;
  $nameMod = nomesModelo($id_modelo);
  $nameLub = nomesLubrificacoes($id_lub);
  $nameOleo = nomesOleos($id_oleo);
  $nameFiltro = nomesFiltros($id_filtro);
}

function translateOleo( $id_oleo){
  global $nameOleo;
  $nameOleo = nomesOleos($id_oleo);
}

function translatePeca( $id_peca){
  global $namePeca;
  $namePeca = nomesPecas($id_peca);
}

function translateNomesPecas( $serial_maquina=null){
  global $namesPecaMaq;
  $namesPecaMaq = nomesPecasMaquina('peca_maquina');
}
