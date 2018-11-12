<?php

if ( ! defined('ABSPATH')) exit; 

// var_dump($_SESSION);
		
$dados = $modelo->listar_jogadores();

$ultimo_campeonato    = $modelo->ultimo_campeonato(); 
$id_ultimo_campeonato = $ultimo_campeonato[0]['id_campeonato'];
$dados_classificacao  = $modelo->gerar_classificacao($id_ultimo_campeonato);
$dados_ultima_rodada  = $modelo->buscar_rodada($id_ultimo_campeonato);
$id_ultimo_rodada     = $dados_ultima_rodada[0]['rodada'];

$dados_rodada         = $modelo->gerar_rodada($id_ultimo_campeonato, $id_ultimo_rodada);
$numero_rodada        = $dados_rodada[0]['rodada'];

?>

<style type="text/css">

button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}  

</style>

    <div class="row">               
        <div class="col-md-8"> 
        <div class="panel-body table-responsive">     
              <div id="div_resultado" >      
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
      								          <img width="40px" src="<?php echo HOME_URI;?>/views/_images/<?php echo $jogador['id_jogadores']; ?>.jpg" class="img-circle" />
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
                   </div>  
             </div>  
                
        </div> 


          <div class="col-md-4"> 
             <div id="div_rodada">  
                <table class="table" >
                  <thead>
                    <tr>
                      <th class="text-left"> <?php if ($numero_rodada > 1) { ?> <span><button onclick="carregar_rodada( <?php echo $numero_rodada - 1; ?> , <?php echo $id_ultimo_campeonato; ?> , 'menor' )"> &nbsp;&nbsp; <i class="fa fa-chevron-left" style="color:green" ></i> &nbsp;&nbsp; </button> </span> <?php  } ?> </th>
                      <th class="text-center" colspan="3" ><?php echo $numero_rodada; ?>ª RODADA</th>
                      <th class="text-right"><button onclick="carregar_rodada( <?php echo $numero_rodada + 1; ?>  , <?php echo $id_ultimo_campeonato; ?>, 'maior' )"> &nbsp; &nbsp;<i class="fa fa-chevron-right" style="color:green" ></i>  &nbsp;&nbsp; </button></th>
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
            </div>    
          </div>
        </div>

<script type="text/javascript">

        function carregar_placar ( placar, jogador, idJogador, num_jogo, idCampeonato  ){

                // Passando funcionario por parametro para a pagina servicos_funcionarios.php
                $.post("<?php echo HOME_URI;?>/dados/",
                      {placar:placar, jogador:jogador, idJogador:idJogador, num_jogo:num_jogo, idCampeonato:idCampeonato },
                      // Carregamos o resultado acima para o campo marca
                      function(valor){
                         $("#div_resultado").html(valor);
                      });
          
        }


        function carregar_rodada( numRodada , idCampeonato ,opcao){

                // Passando funcionario por parametro para a pagina servicos_funcionarios.php
                $.post("<?php echo HOME_URI;?>/dados/",
                      {numRodada:numRodada, idCampeonato:idCampeonato, opcao:opcao, pagina:'gerenciar'  },
                      // Carregamos o resultado acima para o campo marca
                      function(valor){
                         $("#div_rodada").html(valor);
                      });

          
        }
</script>





