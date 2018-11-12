<?php 

/**
 * Classe para registros de Campeonato
 *
 * @package SistsalonMVC
 * @since 0.1
 */



class CampeonatoModel extends MainModel

{



	/**
	 * $form_data
	 *
	 * Os dados do formulário de envio.
	 *
	 * @access public
	 */	

	public $form_data;



	/**
	 * $form_msg
	 *
	 * As mensagens de feedback para o usuário.
	 *
	 * @access public
	 */	

	public $form_msg;



	/**
	 * $db
	 *
	 * O objeto da nossa conexão PDO
	 *
	 * @access public
	 */

	public $db;



	/**
	 * Construtor
	 * 
	 * Carrega  o DB.
	 *
	 * @since 0.1
	 * @access public
	 */

	public function __construct( $db = false ) {

		$this->db = $db;

	}





	/**
	 * Valida o formulário de envio
	 * 
	 * Este método pode inserir ou atualizar dados dependendo do campo de
	 * usuário.
	 *
	 * @since 0.1
	 * @access public
	 */

	public function validar_form_cadastro () {

	

		// Configura os dados do formulário

		$this->form_data = array();

		

		// Verifica se algo foi postado

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {

		

			// Faz o loop dos dados do post

			foreach ( $_POST as $key => $value ) {

			

				// Configura os dados do post para a propriedade $form_data

				$this->form_data[$key] = $value;

				

				// Nós não permitiremos nenhum campos em branco

				if ( empty( $value ) ) {

					

					// Configura a mensagem

					$this->form_msg = '<p class="form_error">Campo obrigatório não foi preenchido. Dados não foram enviados.</p>';

					

					// Termina

					return;

					

				}			

			

			}

		

		} else {

		

			// Termina se nada foi enviado

			return;

			

		}

		

		// Verifica se a propriedade $form_data foi preenchida

		if( empty( $this->form_data ) ) {

			return;

		}



		// Se Ação for inserir, atualiza os dados

		if ($this->form_data['acao_cadastro'] == 'inserir' ) {







				

					// Executa a consulta 

					$query = $this->db->insert('questao', array(

						'ds_questao' 		=> chk_array( $this->form_data, 'ds_questao'), 

						'comentario' 		=> chk_array( $this->form_data, 'comentario'), 

						'ano'		 		=> chk_array( $this->form_data, 'ano'),

						'resposta' 			=> chk_array( $this->form_data, 'resposta'), 

						'id_modalidade' 	=> chk_array( $this->form_data, 'id_modalidade'), 

						'id_alternativas' 	=> chk_array( $this->form_data, 'id_alternativas'), 

						'id_assunto' 		=> chk_array( $this->form_data, 'id_assunto'), 

						'id_banca' 			=> chk_array( $this->form_data, 'id_banca'), 

					));

					

					// Verifica se a consulta está OK e configura a mensagem

					if ( ! $query ) {

					

						$this->form_msg = '<p class="form_error">Internal error. Data has not been sent.</p>';

						

						// Termina

						return;

					} else {		

							

						$this->form_msg = '<p class="form_success">User successfully registered.</p>';

						

						// Termina

						return;

					}

					

			

		} //Fim Inserir.





		

		// Se Ação for editar, atualiza os dados

		if ($this->form_data['acao_cadastro'] == 'editar' ) {





			$telefone = str_replace("(","",$this->form_data['telefone_cadastro']);

			$telefone = str_replace(")","",$telefone);

			$telefone = str_replace("-","",$telefone);

			$telefone = str_replace(" ","",$telefone);



			$nova_data =  $this->inverte_data( $_POST['dt_nasc_cadastro'] );



			$id_func = $this->form_data['id_func'];





			$query = $this->db->update('funcionario', 'id_func', $id_func, array(

				'nome_func' => chk_array( $this->form_data, 'no_cadastro'), 

				'email_func' => chk_array( $this->form_data, 'email_cadastro'), 

				'dt_nasc_func' => $nova_data, 

				'telefone_func' => $telefone, 

				'co_sexo_func' => chk_array( $this->form_data, 'co_sexo_cadastro'), 

			));

			

			// Verifica se a consulta está OK e configura a mensagem

			if ( ! $query ) {

				$this->form_msg = '<p class="bg-danger">Internal error. Data has not been sent.</p>';

				

				// Termina

				return;

			} else {

				$this->form_msg = "<p class='bg-primary'>Funcionário Atualizado com sucesso.</p>";

				

				// Termina

				return;

			}



			

		} //Fim atualizar.





		// Se Ação for ativar, atualiza os dados

		if ($this->form_data['acao_cadastro'] == 'ativar' ) {



			$id_func = $this->form_data['id'];



			$query = $this->db->update('funcionario', 'id_func', $id_func, array(

				'ativo_func' => '1',

			));

			

			// Verifica se a consulta está OK e configura a mensagem

			if ( ! $query ) {

				$this->form_msg = '<p class="bg-danger">Internal error. Data has not been sent.</p>';

				

				// Termina

				return;

			} else {

				$this->form_msg = "<p class='bg-primary'>Ativacão realizada com sucesso.</p>";

				

				// Termina

				return;

			}



		}



		// Se Ação for ativar, atualiza os dados

		if ($this->form_data['acao_cadastro'] == 'desativar' ) {



			$id_func = $this->form_data['id'];



			$query = $this->db->update('funcionario', 'id_func', $id_func, array(

				'ativo_func' => '0',

			));

			

			// Verifica se a consulta está OK e configura a mensagem

			if ( ! $query ) {

				$this->form_msg = '<p class="bg-danger">Internal error. Data has not been sent.</p>';

				

				// Termina

				return;

			} else {

				$this->form_msg = "<p class='bg-primary'> Desativacão realizada com sucesso.</p>";

				

				// Termina

				return;

			}





		}



		

	} // validate_register_form	




	/**
	 * Valida o formulário de envio
	 * 
	 * Este método pode inserir ou atualizar dados dependendo do campo de
	 * usuário.
	 *
	 * @since 0.1
	 * @access public
	 */

	public function inserir_times () {

	

		// Configura os dados do formulário
		$this->form_data = array();

		

		// Verifica se algo foi postado
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && ! empty ( $_POST ) ) {

		
			// Faz o loop dos dados do post
			foreach ( $_POST as $key => $value ) {

			

				// Configura os dados do post para a propriedade $form_data
				$this->form_data[$key] = $value;

				

				// Nós não permitiremos nenhum campos em branco
				if ( empty( $value ) ) {

			
					// Configura a mensagem
					$this->form_msg = '<p class="form_error">Campo obrigatório não foi preenchido. Dados não foram enviados.</p>';

					// Termina
					return;

				}			

			}

		

		} else {

			// Termina se nada foi enviado
			return;

		}

		
		// Verifica se a propriedade $form_data foi preenchida
		if( empty( $this->form_data ) ) {

			return;

		}




					// Verifica se o ID não está vazio
					if ( !empty( $this->form_data['id_jogadores'] ) ) {
					
						// Deleta o usuário
						$query_del = $this->db->delete('jogador_times', 'id_jogadores', $this->form_data['id_jogadores']);
						
					}

					$times = $this->form_data['times']; // $classificacoes recebe do $_POST as opções marcadas.

					foreach($times as $valor ){//percorre o array com as opções selecionadas  
							// Executa a consulta
							$query = $this->db->insert('jogador_times', array(

								'id_jogadores' 	=> $this->form_data['id_jogadores'], 
								'id_times' 		=> $valor, 

							));
					}
							
				
					// Verifica se a consulta está OK e configura a mensagem

					if ( ! $query ) {

						$this->form_msg = '<p class="form_error">Internal error. Data has not been sent.</p>';

						// Termina
						return;

					} else {		

						$this->form_msg = '<p class="form_success">User successfully registered.</p>';

						// Termina
						return;

					}
			


	} //Fim Inserir.





	/**
	 * Obtém a lista de Jogadores
	 * 
	 * @since 0.1
	 * @access public
	 */

	public function listar_jogadores() {

	

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query('SELECT id_jogadores, nome_jogadores, foto_jogadores FROM jogadores ORDER BY 2');

		

		// Verifica se a consulta está OK

		if ( ! $query ) {

			return array();

		}

		// Preenche a tabela com os dados do usuário

		return $query->fetchAll();

	} // listar_Jogadores



	/**
	 * Obtém a lista de times
	 * 
	 * @since 0.1
	 * @access public
	 */

	public function listar_times() {

	

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query('SELECT id_times, nome_time FROM times ORDER BY 2');

		

		// Verifica se a consulta está OK

		if ( ! $query ) {

			return array();

		}

		// Preenche a tabela com os dados do usuário

		return $query->fetchAll();

	} // listar_Times



	/**
	 * Obtém a lista de times
	 * 
	 * @since 0.1
	 * @access public
	 */

	public function listar_times_jogador($id) {

	

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query("SELECT 	jogador_times.id,
											jogador_times.id_jogadores,
											jogador_times.id_times,
											times.nome_time
									FROM jogador_times 
									INNER JOIN times 
										ON (jogador_times.id_times = times.id_times) 
									WHERE jogador_times.id_jogadores = $id");

		

		// Verifica se a consulta está OK

		if ( ! $query ) {

			return array();

		}

		// Preenche a tabela com os dados do usuário

		return $query->fetchAll();

	} // listar_Times

	/**
	 * Obtém a lista de times
	 * 
	 * @since 0.1
	 * @access public
	 */

	public function buscar_time1($id) {

	

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query("SELECT 	jogador_times.id,
											jogador_times.id_jogadores,
											jogador_times.id_times,
											times.nome_time,
											jogador_times.aux
									FROM jogador_times 
									INNER JOIN times 
										ON (jogador_times.id_times = times.id_times) 
									WHERE jogador_times.id_jogadores = $id AND jogador_times.aux = 'F'  ORDER BY RAND() LIMIT 1");

		

		// Verifica se a consulta está OK

		if ( ! $query ) {

			return array();

		}

		// Preenche a tabela com os dados do usuário

		return $query->fetchAll();

	} // listar_Times

	public function buscar_time2($id , $time) {

	

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query("SELECT 	jogador_times.id,
											jogador_times.id_jogadores,
											jogador_times.id_times,
											times.nome_time,
											jogador_times.aux
									FROM jogador_times 
									INNER JOIN times 
										ON (jogador_times.id_times = times.id_times) 
									WHERE jogador_times.id_jogadores = $id AND jogador_times.id_times <> $time AND jogador_times.aux = 'F' ORDER BY RAND() LIMIT 1");

		

		// Verifica se a consulta está OK

		if ( ! $query ) {

			return array();

		}

		// Preenche a tabela com os dados do usuário

		return $query->fetchAll();

	} // listar_Times


	public function atualizar_time_t($id_jogadores , $id_times) {

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query("UPDATE jogador_times SET aux = 'T' WHERE id_jogadores = $id_jogadores AND id_times = $id_times");

		

		// Verifica se a consulta está OK


			return ;

	} // listar_Times


	public function atualizar_time_f($id_jogadores) {

		// Simplesmente seleciona os dados na base de dados 

		$query = $this->db->query("UPDATE jogador_times SET aux = 'F' WHERE id_jogadores = $id_jogadores");

	

		// Preenche a tabela com os dados do usuário

		return ;

	} // listar_Times



	public function inserir_jogos($no_campeonato, $jogadores_banco, $jogos_banco) {


				// Executa a consulta 
				$query = $this->db->insert('campeonato', array(
					'nome_campeonato' => $no_campeonato, 
					'date_campeonato' => date('Y-m-d'),
				));
				
				// Verifica se a consulta está OK e configura a mensagem
				if ( ! $query ) {
					$this->form_msg = '<p class="form_error">Internal error. Data has not been sent.</p>';
					
					// Termina
					return;

				} else {
				
					$ultimo_id = $this->db->last_id; //Último ID inserido


				foreach ($jogadores_banco as $jogador){

					// Executa a consulta 
					$this->db->insert('jogadores_campeonato', array(
						'id_jogadores' => $jogador, 
						'id_campeonato' => $ultimo_id, 
					));

				}

				foreach ($jogos_banco as $jogos){

					// Executa a consulta 
					$this->db->insert('jogadores_partidadas', array(
						'nome_time_1' => $jogos['nome_time_1'], 
						'id_jogadores_1' => $jogos['id_jogadores_1'], 
						'nome_time_2' => $jogos['nome_time_2'], 
						'id_jogadores_2' => $jogos['id_jogadores_2'], 
						'num_partida' => $jogos['num_partida'], 
						'rodada' => $jogos['rodada'], 
						'turno' => $jogos['turno'], 
						'num_jogo' => $jogos['num_jogos_aux'], 
						'id_campeonato' => $ultimo_id, 
					));

				}


					// Verifica se a consulta está OK e configura a mensagem
					if ( ! $query ) {
					
						$this->form_msg = '<p class="form_error">Internal error. Data has not been sent.</p>';
						
						// Termina
						return;
					} else {		
							
						$this->form_msg = '<p class="form_success">User successfully registered.</p>';
						
						// Termina
						return;
					}
					
					// Termina
					return;
				}

	} // listar_Times

}