<?php

if ( ! defined('ABSPATH')) exit; 



if (isset($_POST['id_jogadores'])) {


if ($_POST['id_jogadores']) {

 	$jogadores_post = $_POST['id_jogadores'];
 	
}


}else{

	$jogadores_post = null;

}


if (isset($_POST['times']) && isset($_POST['id_jogadores']) && isset($_POST['inserir'])) {


	$modelo->inserir_times();
	


}


?>

                <!-- /.row -->		

               <!-- Título e breacrumb - também conhecido como "migalhas de pão" -->

                <div class="row">



                </div> 



				<br/><p></p>

                <!-- /.row -->

    <!-- Custom CSS -->

<link href="<?php echo HOME_URI;?>/views/_css/questoes.css" rel="stylesheet">





<div class="row">
			<div class="form-group col-md-4"> 



			</div>

			<div class="form-group col-md-4">

				<label for="id_jogadores"> jogadores <span class="text-danger">*</span></label>


				<form name="frm_jogadores" action="" method="post">

				<select name="id_jogadores" class="form-control" id="id_jogadores" onchange="document.frm_jogadores.submit();" required="">
				      

                        <?php 
                        	if ($jogadores_post == null) {

                        		echo "<option> -=Selecione o Jogador=- </option>";

                        	}
                            

                            $dados_jogadores = $modelo->listar_jogadores();

                            foreach ($dados_jogadores as $jogadores){

                            $jogadores_banco =	$jogadores['id_jogadores'];

                        ?>


                        <option  <?php if( $jogadores_post == $jogadores_banco ){ echo' selected '; } ?>  value="<?php echo $jogadores['id_jogadores']; ?>" > <?php echo $jogadores['nome_jogadores']; ?></option>


                        <?php 

                            } 

                        ?>
				      </select>
				     
				</form>


			</div>
			<div class="form-group col-md-4"> 

			</div>
</div>
<?php

$dados_times_jogador = null;

if ($jogadores_post) {

	$dados_times_jogador = $modelo->listar_times_jogador($jogadores_post);

}
	
if ($dados_times_jogador) {


?>
<div class="row">

      <div class="col-md-12">
      	  <div class="content-panel">
      	  	  <h4><i class="fa fa-angle-right"></i> TIMES</h4>
      	  	  <hr>
              <table class="table">
                  <thead>
                  <tr>
                      <th></th>
                      <th>Nome</th>
                  </tr>
                  </thead>
                  <tbody>
				    <?php 

						  $row = 1; 
						  foreach($dados_times_jogador as $dado){ //Combo Tipo Logradouro  ?>
                          <tr>
                              <td><?php echo $row; ?></td>
                              <td><?php echo $dado['nome_time']; ?></td>
                          </tr>
						
					<?php $row ++; } ?>
                  </tbody>
              </table>
      	  </div><!--/content-panel -->
      </div><!-- /col-md-12 -->
</div><!-- row -->
<?php } ?>

<?php if (isset($_POST['id_jogadores'])) { 

if ($_POST['id_jogadores']) {

?>
<form method="post">
<div class="row">
					<!-- panel Situações prioritárias -->



					<div class="panel panel-default"  >
					  <div class="panel-heading"> TIMES </div>
						<div class="panel-body ">
							<div class="row">
							<?php 

	                            $dados_times = $modelo->listar_times();

	                            foreach ($dados_times as $times){

							?>
								<div class="col-lg-2">
									<label class="checkbox-inline">
									  <input type="checkbox"  name="times[]"  value="<?php echo $times['id_times']; ?>" <?php

									  	if (isset($_POST['id_jogadores'])) {

										  	$times_jogador = $dados_times_jogador; // $time recebe do $_POST as opções marcadas.

											foreach($times_jogador as $valor ){//percorre o array com as opções selecionadas  

												if($valor['id_times'] == $times['id_times']){

													echo "checked";

												}

											} 

										}


									  ?> > <?php echo $times['nome_time']; ?>
									</label>
								</div>		  		
							<?php } ?>
							</div>		  		
						</div>		  		
					</div>	
					<!-- / panel Situações prioritárias -->
							<input style="display:none;" type="text" name="id_jogadores" value="<?php echo $jogadores_post; ?>">
							<center>
								<input style="display:none;" type="text" name="inserir" value="sim">
								<input class="btn btn-salvar"  type="submit" value="Salvar">
							</center>

						
</div>
</form>

<?php 
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









  

