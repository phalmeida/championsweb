<?php

/**

 * Configuração geral

 */



// Caminho para a raiz

define( 'ABSPATH', dirname( __FILE__ ) );



// Caminho para a pasta de uploads

define( 'UP_ABSPATH', ABSPATH . '/views/_uploads' );



// URL da home

define( 'HOME_URI', 'http://philipealmeida.com.br/campeonato' );



// Nome do host da base de dados

define( 'HOSTNAME', 'mysql.hostinger.com.br' );



// Nome do DB

define( 'DB_NAME', 'u216026909_simu' );



// Usuário do DB

define( 'DB_USER', 'u216026909_simu' );



// Senha do DB

define( 'DB_PASSWORD', 'simulados' );



// Charset da conexão PDO

define( 'DB_CHARSET', 'utf8' );



// Se você estiver desenvolvendo, modifique o valor para true

define( 'DEBUG', false );





/**

 * Não edite daqui em diante

 */



// Carrega o loader, que vai carregar a aplicação inteira

require_once ABSPATH . '/loader.php';

?>
