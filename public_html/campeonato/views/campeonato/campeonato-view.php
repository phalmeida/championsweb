<?php

if ( ! defined('ABSPATH')) exit; 


?>
                <!-- /.row -->		
               <!-- Título e breacrumb - também conhecido como "migalhas de pão" -->
                <div class="row">


                </div> 

				<br/><p></p>
                <!-- /.row -->


			<div class="row">
				<div class="col-md-12">
					<form data-toggle="validator" role="form" action="" method="post">
						<!-- Bloco Dados funcionariois  -->
						<fieldset>
							<legend class="text-redesuas">Selecione os jogadores</legend>
							<?php

	                            $dados_jogadores = $modelo->listar_jogadores();

	                            foreach ($dados_jogadores as $jogadores){

							?>
								<div class="form-group col-md-2">
								    <div class="input-group">
								      <span class="input-group-addon primary">
								        <input type="checkbox"  name="jogadores[]"   id="jogador<?php echo $jogadores['id_jogadores'];?>" value="<?php echo $jogadores['id_jogadores'];?>" aria-label="..." >
								      </span>
								          <label for="jogador<?php echo $jogadores['id_jogadores'];?>">
											<div class="pull-left">
												<img width="40px" src="<?php echo HOME_URI;?>/views/_images/<?php echo $jogadores['id_jogadores']; ?>.jpg" class="img-circle" alt="User Image"/>
											</div> 
											  <?php echo $jogadores['nome_jogadores'];?>
										  </label>
								    </div><!-- /input-group -->
								</div>
								<?php } ?>						
						</fieldset>
						<!-- /Bloco Dados funcionariois  -->
		               <fieldset>
                        <legend class="text-redesuas">Dados do Campeonato</legend>
                        <div class="form-group col-md-6">
                            <label for="no_campeonato">Nome <span class="text-danger">*</span></label>
                            <input type="text" name="no_campeonato" class="form-control" id="no_campeonato"  placeholder="Digite o nome do campeonato" maxlength="80" required="">
                        </div>
                    </fieldset>				
						</p><br></p>																				
						<center>
							<input type="hidden" name="opcao" value="inserir" />
							<div class="form-group col-md-12">
								<button type="submit" class="btn btn-salvar"><b>&nbsp;&nbsp;  Gerar campeonato  &nbsp;&nbsp;</b> </span></button>
							</div>
						</center>
					</form>
				</div>
			</div>	

<?php

		
	if (isset($_POST['jogadores'])&&isset($_POST['opcao'])&&isset($_POST['no_campeonato'])) {


				$dados = $_POST['jogadores'];
						
				$times = array();

					foreach ($dados as $jogador){ 
					
						$times[] = $jogador;
						
					}

				$result_num = count($times);
				if($result_num % 2 == 0){

				}
				else{

					$times[] = 'aux';
				}
					
				$rodada = array();
				$tentativa=null;
				while ($rodada == false) {
				    $rodada = gera_jogos($times);
				    $tentativa++;
				}


				$jogos_banco = array();
				$num_jogos_aux = 1;			
						
				foreach ($rodada as $c => $v) { //PRIMEIRO TURNO
	
				    $num_rodada = $c;

					$row = 1;
				    foreach ($v as $i) {

				    	if ($i['m']!='aux' && $i['v']!='aux' ) {					


							$dados_time1 = $modelo->buscar_time1($i['m']);

							if($dados_time1){

								$time1 = $dados_time1[0]['nome_time'];
								$Idtime1 = $dados_time1[0]['id_times'];
								$modelo->atualizar_time_t($i['m'],$Idtime1);

							}else{

								$modelo->atualizar_time_f($i['m']);
								$dados_time1 = $modelo->buscar_time1($i['m']);
								$time1 = $dados_time1[0]['nome_time'];
								$Idtime1 = $dados_time1[0]['id_times'];				
							}



							$dados_time2 = $modelo->buscar_time2($i['v'] , $Idtime1 );

							if($dados_time2){

								$time2 = $dados_time2[0]['nome_time'];
								$Idtime2 = $dados_time2[0]['id_times'];
								$modelo->atualizar_time_t($i['v'],$Idtime2);

							}else{

								$modelo->atualizar_time_f($i['v']);
								$dados_time2 = $modelo->buscar_time2($i['v'] , $Idtime1 );
								$time2 = $dados_time2[0]['nome_time'];
								$Idtime2 = $dados_time2[0]['id_times'];	
							}

							$jogos_banco[$num_jogos_aux]['turno'] 			= '1';
							$jogos_banco[$num_jogos_aux]['rodada'] 			= $c;
							$jogos_banco[$num_jogos_aux]['num_partida'] 		= $row;
							$jogos_banco[$num_jogos_aux]['nome_time_1'] 		= $time1;
							$jogos_banco[$num_jogos_aux]['id_jogadores_1'] 	= $i['m'];
							$jogos_banco[$num_jogos_aux]['id_jogadores_2'] 	= $i['v'];
							$jogos_banco[$num_jogos_aux]['nome_time_2'] 		= $time2;
							$jogos_banco[$num_jogos_aux]['num_jogos_aux'] 		= $num_jogos_aux;


							//echo $row++,' - time: ',$time1, '  ', $i['m'], ' x ', $i['v'], '  time: ',$time2,  '<br />';
							$num_jogos_aux++;
						}		

				    }
				}


				foreach ($rodada as $c => $v) { //SEGUNDO TURNO

					$num_c = $c+$num_rodada;

					$row = 1;
				    foreach ($v as $i) {

				    	if ($i['m']!='aux' && $i['v']!='aux' ) {					


							$dados_time1 = $modelo->buscar_time1($i['m']);

							if($dados_time1){

								$time1 = $dados_time1[0]['nome_time'];
								$Idtime1 = $dados_time1[0]['id_times'];
								$modelo->atualizar_time_t($i['m'],$Idtime1);

							}else{

								$modelo->atualizar_time_f($i['m']);
								$dados_time1 = $modelo->buscar_time1($i['m']);
								$time1 = $dados_time1[0]['nome_time'];
								$Idtime1 = $dados_time1[0]['id_times'];				
							}



							$dados_time2 = $modelo->buscar_time2($i['v'] , $Idtime1 );

							if($dados_time2){

								$time2 = $dados_time2[0]['nome_time'];
								$Idtime2 = $dados_time2[0]['id_times'];
								$modelo->atualizar_time_t($i['v'],$Idtime2);

							}else{

								$modelo->atualizar_time_f($i['v']);
								$dados_time2 = $modelo->buscar_time2($i['v'] , $Idtime1 );
								$time2 = $dados_time2[0]['nome_time'];
								$Idtime2 = $dados_time2[0]['id_times'];	
							}

							$jogos_banco[$num_jogos_aux]['turno'] 			= '2';
							$jogos_banco[$num_jogos_aux]['rodada'] 			= $num_c;
							$jogos_banco[$num_jogos_aux]['num_partida'] 		= $row;
							$jogos_banco[$num_jogos_aux]['nome_time_1'] 		= $time1;
							$jogos_banco[$num_jogos_aux]['id_jogadores_1'] 	= $i['m'];
							$jogos_banco[$num_jogos_aux]['id_jogadores_2'] 	= $i['v'];
							$jogos_banco[$num_jogos_aux]['nome_time_2'] 		= $time2;
							$jogos_banco[$num_jogos_aux]['num_jogos_aux'] 		= $num_jogos_aux;

							//echo $row++,' - time: ',$time1, '  ', $i['m'], ' x ', $i['v'], '  time: ',$time2,  '<br />';
							$num_jogos_aux++;
						}		

				    }
				}


				$no_campeonato = $_POST['no_campeonato'];
				$jogadores_banco = $dados;

				$modelo->inserir_jogos($no_campeonato, $jogadores_banco, $jogos_banco);



				foreach ($dados as $jogador){

					$modelo->atualizar_time_f($jogador);

				}


		}


?>

    </div>
  </div>
</div>























<script type="text/javascript">

	



function verificar_resposta (id_questao , id_modalidade) {





	if (id_modalidade == '1') {





						if (document.getElementById('resposta_c').checked) {



						  resposta = 'C';



						}else if(document.getElementById('resposta_e').checked){



							resposta = 'E';



						}else{



							resposta = 'N';



						}



	}





	if (id_modalidade == '2') {





						if (document.getElementById('resposta_A').checked) {



						  resposta = 'A';



						}else if(document.getElementById('resposta_B').checked){



							resposta = 'B';



						}else if(document.getElementById('resposta_C').checked){



							resposta = 'C';



						}else if(document.getElementById('resposta_D').checked){



							resposta = 'D';



						}else if(document.getElementById('resposta_E').checked){



							resposta = 'E';



						}else{



							resposta = 'N';



						}



	}





			//Envia o valor do NIS via Ajax para a pagina busca_cecad.php pelo método POST

			$.post('http://localhost/simulados/dados-questoes/resposta.php', { id_questao:id_questao, resposta:resposta }, function(data, textStatus) { 

				

				 if (textStatus == 'success') { //verifica se o status está tudo ok!

					$('#div_resposta').html(data); //insere o valor de data no div #div_detalhar

				 } else {

					 alert('Erro no request!'); //mostra erro caso não tenha sido bem sucedido

				 }			

				



			});







}





function atualizar () {



	window.location.href = "/simulado/";



}



</script>









  

