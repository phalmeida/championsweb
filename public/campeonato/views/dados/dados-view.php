<?php

if ( ! defined('ABSPATH')) exit; 

if (isset($_POST['numRodada'])&&isset($_POST['idCampeonato'])&&isset($_POST['opcao'])&&isset($_POST['pagina'])) {

$id_ultimo_campeonato =	$_POST['idCampeonato'];

$dados_rodada         = $modelo->gerar_rodada($_POST['idCampeonato'], $_POST['numRodada']);
$numero_rodada        = $dados_rodada[0]['rodada'];

$dados_ultima_rodada  = $modelo->buscar_ultima_rodada($_POST['idCampeonato']);
$ultima_rodada 		  = $dados_ultima_rodada[0]['rodada'];


	if($_POST['pagina'] == 'principal'){
	?>

					<table class="table" >
					  <thead>
						<tr>
						  <th class="text-left"> <?php if ($numero_rodada > 1) { ?> <span><button onclick="carregar_rodada( <?php echo $numero_rodada - 1; ?> , <?php echo $id_ultimo_campeonato; ?> , 'menor' )"> &nbsp;&nbsp; <i class="fa fa-chevron-left" style="color:green" ></i> &nbsp;&nbsp; </button> </span> <?php  } ?> </th>
						  <th class="text-center" colspan="3" ><?php echo $numero_rodada; ?>ª RODADA</th>
						  <th class="text-right"><?php if ($numero_rodada < $ultima_rodada) { ?>  <button onclick="carregar_rodada( <?php echo $numero_rodada + 1; ?>  , <?php echo $id_ultimo_campeonato; ?>, 'maior' )"> &nbsp; &nbsp;<i class="fa fa-chevron-right" style="color:green" ></i>  &nbsp;&nbsp; </button> <?php  } ?></th>
						</tr>
					  </thead>
					  <tbody>
						  <?php foreach ($dados_rodada as $rodada){ ?>
							<tr>
							  <th class="text-right"> <?php echo $rodada['nome_jogadores1']; ?> <h6><?php echo $rodada['nome_time_1']; ?></h6> </th>
							  <th class="text-center" >
								  <h4><b><?php if(isset($rodada['num_gols_jogador_1'])){  echo $rodada['num_gols_jogador_1'];  }?></b></h4>
							  </th>
							  <th class="text-center" ><h4>x</h4></th>
							  <th class="text-center" >
								  <h4><b><?php if(isset($rodada['num_gols_jogador_2'])){  echo $rodada['num_gols_jogador_2'];  }?></b></h4>
							  </th>
							  <th> <?php echo $rodada['nome_jogadores2']; ?>  <h6><?php echo $rodada['nome_time_2']; ?></h6> </th>
							</tr>
						   <?php } ?>          
					  </tbody>
			  </table>


	<?php
	}

	if($_POST['pagina'] == 'gerenciar'){
	?>

					<table class="table" >
					  <thead>
						<tr>
						  <th class="text-left"> <?php if ($numero_rodada > 1) { ?> <span><button onclick="carregar_rodada( <?php echo $numero_rodada - 1; ?> , <?php echo $id_ultimo_campeonato; ?> , 'menor' )"> &nbsp;&nbsp; <i class="fa fa-chevron-left" style="color:green" ></i> &nbsp;&nbsp; </button> </span> <?php  } ?> </th>
						  <th class="text-center" colspan="3" ><?php echo $numero_rodada; ?>ª RODADA</th>
						  <th class="text-right"><?php if ($numero_rodada < $ultima_rodada) { ?>  <button onclick="carregar_rodada( <?php echo $numero_rodada + 1; ?>  , <?php echo $id_ultimo_campeonato; ?>, 'maior' )"> &nbsp; &nbsp;<i class="fa fa-chevron-right" style="color:green" ></i>  &nbsp;&nbsp; </button> <?php  } ?></th>
						</tr>
					  </thead>
					  <tbody>

					  <?php foreach ($dados_rodada as $rodada){ ?>
						<tr>
						  <th class="text-right"> <?php echo $rodada['nome_jogadores1']; ?> <h6><?php echo $rodada['nome_time_1']; ?></h6> </th>
						  <th class="text-center" >
							  <input class="form-control" <?php if(isset($rodada['num_gols_jogador_1'])){  echo "value='".$rodada['num_gols_jogador_1']."'";  }?> onkeyup="carregar_placar(this.value, 1 , <?php echo $rodada['id_jogadores_1']; ?> , <?php echo $rodada['num_jogo']; ?> , <?php echo $rodada['id_campeonato']; ?> )" id="ex1" type="text" size="2" maxlength="2"> 
						  </th>
						  <th class="text-center" >x</th>
						  <th class="text-center" >
							  <input class="form-control" <?php if(isset($rodada['num_gols_jogador_2'])){  echo "value='".$rodada['num_gols_jogador_2']."'";  }?> onkeyup="carregar_placar(this.value, 2 , <?php echo $rodada['id_jogadores_2']; ?> , <?php echo $rodada['num_jogo']; ?> , <?php echo $rodada['id_campeonato']; ?> )" id="ex1" type="text" size="2" maxlength="2"> 
						  </th>
						  <th> <?php echo $rodada['nome_jogadores2']; ?>  <h6><?php echo $rodada['nome_time_2']; ?></h6> </th>
						</tr>
					   <?php } ?>            
					  </tbody>
			  </table>


	<?php
	}

}

//numRodada , idCampeonato ,opcao 

if (isset($_POST['placar'])&&isset($_POST['jogador'])&&isset($_POST['idJogador'])&&isset($_POST['num_jogo'])&&isset($_POST['idCampeonato'])) {

	$placar 		= $_POST['placar'];
	$jogador 		= $_POST['jogador'];
	$idJogador 		= $_POST['idJogador'];
	$num_jogo 		= $_POST['num_jogo'];
	$idCampeonato  	= $_POST['idCampeonato'];



	if ($_POST['jogador'] == 1) {

		$modelo->atualizar_placar_jogador1($placar, $jogador, $idJogador, $num_jogo, $idCampeonato);

	}

	if ($_POST['jogador'] == 2) {

		$modelo->atualizar_placar_jogador2($placar, $jogador, $idJogador, $num_jogo, $idCampeonato);
	
		
	}

	$modelo->zerar_placar( $idCampeonato );
	
	$dados_rodadas = $modelo->busca_dados_rodada( $idCampeonato );

	if ($dados_rodadas) {


		foreach ($dados_rodadas as  $dados) {

			if ($dados['num_gols_jogador_1'] > $dados['num_gols_jogador_2'] ) {
				
				//Vitória do jogador 1	
				$dados_jogador1 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_1'] );
				$pontos1 	= $dados_jogador1[0]['pontos'] 	+ 3;
				$jogos1 	= $dados_jogador1[0]['jogos'] 	+ 1;
				$vitoria1 	= $dados_jogador1[0]['vitoria'] + 1;
				$derrota1 	= $dados_jogador1[0]['derrota'] + 0;
				$empate1 	= $dados_jogador1[0]['empate'] 	+ 0;
				$gp1 		= $dados_jogador1[0]['gp'] 		+ $dados['num_gols_jogador_1'];
				$gc1 		= $dados_jogador1[0]['gc'] 		+ $dados['num_gols_jogador_2'];
				$sg1		= $gp1 - $gc1;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_1'] , $pontos1, $jogos1, $vitoria1 , $derrota1 , $empate1, $gp1 , $gc1, $sg1 );
				
				//Derrota do jogador 2	
				$dados_jogador2 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_2'] );
				$pontos2 	= $dados_jogador2[0]['pontos'] 	+ 0;
				$jogos2 	= $dados_jogador2[0]['jogos'] 	+ 1;
				$vitoria2 	= $dados_jogador2[0]['vitoria'] + 0;
				$derrota2 	= $dados_jogador2[0]['derrota'] + 1;
				$empate2 	= $dados_jogador2[0]['empate'] 	+ 0;
				$gp2 		= $dados_jogador2[0]['gp'] 		+ $dados['num_gols_jogador_2'];
				$gc2 		= $dados_jogador2[0]['gc'] 		+ $dados['num_gols_jogador_1'];
				$sg2		= $gp2 - $gc2;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_2'] , $pontos2, $jogos2, $vitoria2, $derrota2, $empate2, $gp2 , $gc2, $sg2   );

			}elseif ($dados['num_gols_jogador_1'] < $dados['num_gols_jogador_2'] ) {

				//Vitória do jogador 2
				$dados_jogador2 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_2'] );
				$pontos2 	= $dados_jogador2[0]['pontos'] 	+ 3;
				$jogos2 	= $dados_jogador2[0]['jogos'] 	+ 1;
				$vitoria2 	= $dados_jogador2[0]['vitoria'] + 1;
				$derrota2 	= $dados_jogador2[0]['derrota'] + 0;
				$empate2	= $dados_jogador2[0]['empate'] 	+ 0;
				$gp2 		= $dados_jogador2[0]['gp'] 		+ $dados['num_gols_jogador_2'];
				$gc2 		= $dados_jogador2[0]['gc'] 		+ $dados['num_gols_jogador_1'];
				$sg2		= $gp2 - $gc2;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_2'] , $pontos2, $jogos2, $vitoria2 , $derrota2 , $empate2, $gp2 , $gc2, $sg2  );
				
				//Derrota do jogador 1	
				$dados_jogador1 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_1'] );
				$pontos1 	= $dados_jogador1[0]['pontos'] 	+ 0;
				$jogos1 	= $dados_jogador1[0]['jogos'] 	+ 1;
				$vitoria1 	= $dados_jogador1[0]['vitoria'] + 0;
				$derrota1 	= $dados_jogador1[0]['derrota'] + 1;
				$empate1 	= $dados_jogador1[0]['empate'] 	+ 0;
				$gp1 		= $dados_jogador1[0]['gp'] 		+ $dados['num_gols_jogador_1'];
				$gc1 		= $dados_jogador1[0]['gc'] 		+ $dados['num_gols_jogador_2'];
				$sg1		= $gp1 - $gc1;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_1'] , $pontos1, $jogos1, $vitoria1, $derrota1, $empate1, $gp1 , $gc1, $sg1  );
				
			}else{

				//Empate do jogador 1	
				$dados_jogador1 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_1'] );
				$pontos1 	= $dados_jogador1[0]['pontos'] 	+ 1;
				$jogos1 	= $dados_jogador1[0]['jogos'] 	+ 1;
				$vitoria1 	= $dados_jogador1[0]['vitoria'] + 0;
				$derrota1 	= $dados_jogador1[0]['derrota'] + 0;
				$empate1 	= $dados_jogador1[0]['empate'] 	+ 1;
				$gp1 		= $dados_jogador1[0]['gp'] 		+ $dados['num_gols_jogador_1'];
				$gc1 		= $dados_jogador1[0]['gc'] 		+ $dados['num_gols_jogador_2'];
				$sg1		= $gp1 - $gc1;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_1'] , $pontos1, $jogos1, $vitoria1 , $derrota1 , $empate1, $gp1 , $gc1, $sg1   );
				
				//Empate do jogador 2	
				$dados_jogador2 = $modelo->buscar_status_jogador( $dados['id_campeonato'] , $dados['id_jogadores_2'] );
				$pontos2 	= $dados_jogador2[0]['pontos'] 	+ 1;
				$jogos2 	= $dados_jogador2[0]['jogos'] 	+ 1;
				$vitoria2 	= $dados_jogador2[0]['vitoria'] + 0;
				$derrota2 	= $dados_jogador2[0]['derrota'] + 0;
				$empate2 	= $dados_jogador2[0]['empate'] 	+ 1;
				$gp2 		= $dados_jogador2[0]['gp'] 		+ $dados['num_gols_jogador_2'];
				$gc2 		= $dados_jogador2[0]['gc'] 		+ $dados['num_gols_jogador_1'];
				$sg2		= $gp2 - $gc2;
				$modelo->atualizar_placar( $dados['id_campeonato'] , $dados['id_jogadores_2'] , $pontos2, $jogos2, $vitoria2, $derrota2, $empate2, $gp2 , $gc2, $sg2  );				
				

			}
			
		}	

	}

$dados_classificacao  = $modelo->gerar_classificacao($idCampeonato);

?>

                  <table class="table table-striped-column">
                    <thead>
                      <tr>
                        <th colspan="3" >CLASSIFICAÇÃO</th>
                        <th>P</th> 
                        <th>J</th>
                        <th>V</th>
                        <th>E</th>
                        <th>D</th>
                        <th>GP</th>
                        <th>GC</th>
                        <th>SG</th>
                        <th>%</th>
                        <th>ÚLT. JOGOS</th>
                      </tr>
                    </thead>
                    <tbody>
        			
        			<?php 
        			
        			$row = 1;
        			foreach ($dados_classificacao as $jogador){
        			?>
                      <tr>
                        <th><?php echo $row++; ?></th>
                        <th>
							<div class="pull-left">
								<img width="40px" src="<?php echo HOME_URI;?>/views/_images/<?php echo $jogador['id_jogadores']; ?>.jpg" class="img-circle" alt="User Image"/>
							</div>
						</th>
                        <th><?php echo $jogador['nome_jogadores']; ?></th>                
                        <td><b style="font-size: 15px;" ><?php echo $jogador['pontos']; ?></b></td>
                        <td><?php echo $jogador['jogos']; ?></td>
                        <td><?php echo $jogador['vitoria']; ?></td>
                        <td><?php echo $jogador['empate']; ?></td>
                        <td><?php echo $jogador['derrota']; ?></td>
                        <td><?php echo $jogador['gp']; ?></td>
                        <td><?php echo $jogador['gc']; ?></td>
                        <td><?php echo $jogador['sg']; ?></td>
                        <td><?php if($jogador['pontos']!=0){ echo round(($jogador['pontos']/($jogador['jogos']*3))*100, 1); }else{ echo '0.00'; } ?></td>
                        <th>
						
						<?php
						
							$dados_resultado = $modelo->gerar_resultado( $jogador['id_campeonato'] , $jogador['id_jogadores'] );
							
							foreach ($dados_resultado as $resultado){
							
								if($resultado['resultado'] == 'vitoria'){
								
									echo '<i class="fa fa-circle " style="color:#51a81e; font-size: 10px;" ></i> ';
								
								}elseif($resultado['resultado'] == 'derrota'){
									
									echo '<i class="fa fa-circle " style="color:#f00; font-size: 10px;" ></i> ';
								
								}else{
								
									echo '<i class="fa fa-circle "  style=" color:#ccc; font-size: 10px;" ></i> ';
								
								}
							
							}
							
						?>    
                      </tr>
        			<?php } ?>
                    </tbody>
                  </table>

<?php

}