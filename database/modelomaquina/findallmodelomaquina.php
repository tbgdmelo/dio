<?php
//Procurar todos os registro de uma tabela
require_once('../../config/config.php');
require_once(DBAPI);
require_once('findmodelomaquina.php');
function find_all( $table ) {	  
	return find($table);	
}