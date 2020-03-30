<?php

/** O nome do banco de dados*/
define('DB_NAME', 'dio-system');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
    define('BASEURL', '/dio2/');

/** caminho das imagens**/
if ( !defined('IMG') )
define('IMG', '../img/');

/** caminho do arquivo de acesso do banco de dados **/
if ( !defined('DBAPI') )
    define('DBAPI', ABSPATH . '../database/database.php');




