<?php

/**

 * TimesController - Controller de exemplo

 *

 * @package SistsalonMVC

 * @since 0.1

 */

class DadosController extends MainController

{



	/**

	 * $login_required

	 *

	 * Se a página precisa de login

	 *

	 * @access public

	 */

	public $login_required = false;



	/**

	 * $permission_required

	 *

	 * Permissão necessária

	 *

	 * @access public

	 */

	// public $permission_required = 'user-register';



	/**

	 * Carrega a página "/views/user-register/index.php"

	 */

    public function index() {

		// Page title

		$this->title = 'Dados';

		

		// Verifica se o usuário está logado

		// if ( ! $this->logged_in ) {

		

		// 	// Se não; garante o logout

		// 	$this->logout();

			

		// 	// Redireciona para a página de login

		// 	$this->goto_login();

			

		// 	// Garante que o script não vai passar daqui

		// 	return;

		

		// }

		

		// Verifica se o usuário tem a permissão para acessar essa página

		// if (!$this->check_permissions($this->permission_required, $this->userdata['user_permissions'])) {

		

			// // Exibe uma mensagem

			// echo 'Você não tem permissões para acessar essa página.';

			

			// // Finaliza aqui

			// return;

		// }

	

		// Parametros da função

		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();

	

		// Carrega o modelo para este view

        $modelo = $this->load_model('dados/dados-model');

				

		/** Carrega os arquivos do view **/

		

		// /views/_includes/cabecalho.php

        //require ABSPATH . '/views/_includes/cabecalho.php';

		

		// /views/_includes/menu.php

        //require ABSPATH . '/views/_includes/menu.php';

		

		// /views/times/index.php

        require ABSPATH . '/views/dados/dados-view.php';

		

		// /views/_includes/rodape.php

        //require ABSPATH . '/views/_includes/rodape.php';

		

    } // index

	

} // class home