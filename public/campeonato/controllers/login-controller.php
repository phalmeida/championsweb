<?php
/**
 * LoginController - Controller de exemplo
 *
 * @package SistsalonMVC
 * @since 0.1
 */
class LoginController extends MainController
{

	/**
	 * Carrega a página "/views/login/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Login';
		
		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Login não tem Model
		
		/** Carrega os arquivos do view **/
		
		// /views/_includes/cabecalho.php
        require ABSPATH . '/views/_includes/cabecalho.php';
		
		// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
		// /views/home/login-view.php
        require ABSPATH . '/views/login/login-view.php';
		
		// /views/_includes/rodape.php
        require ABSPATH . '/views/_includes/rodape.php';
		
    } // index
	
} // class LoginController