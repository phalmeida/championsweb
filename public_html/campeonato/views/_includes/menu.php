<?php if ( ! defined('ABSPATH')) exit; 

        // Verifica se o parâmetro path foi enviado
        if ( isset( $_GET['path'] ) ) {
    
            // Captura o valor de $_GET['path']
            $path = $_GET['path'];
            
            // Limpa os dados
            $path = rtrim($path, '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);
            
            // Cria um array de parâmetros
            $path = explode('/', $path);
            
            // Configura as propriedades
            $pagina  = chk_array( $path, 0 );

        }else{

            $pagina = 'principal';


        }


?>

<?php if ( $this->login_required && ! $this->logged_in ) return; ?>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Marca a alternância se agrupados para melhor visualização móvel -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Alternar navegação<</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- Imagem RedeSUAS --> &nbsp; <img src="<?php echo HOME_URI;?>/views/_images/logo.png" width="130" height="55" alt="PES 2016"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            </div>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
			
			<!-- Top Menu Items -->
           <?php if ( $this->logged_in ) { ?> <!-- verifica se está logado. -->
		   <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><b> Olá,  <?php  echo $_SESSION["userdata"]["usuario"]; ?></b> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo HOME_URI;?>/sair/"><i class="fa fa-fw fa-power-off"></i> Sair </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php } ?>

                <ul class="nav navbar-nav navbar-left">
                <?php if ( $this->logged_in ) { ?>
                    <li <?php if( $pagina == 'principal' ) { echo "class='active'"; } ?> >
                        <a href="<?php echo HOME_URI;?>"><i class="fa fa-fw fa-dashboard"></i> <b> Principal </b></a>
                    </li>
					<li <?php if( $pagina == 'times' ) { echo "class='active'"; } ?> >
                        <a href="<?php echo HOME_URI;?>/times/"><i class="fa fa-fw fa-bar-chart-o"></i><b> Selecionar Times </b></a>
                    </li>
					
					<?php if($_SESSION["userdata"]["permissao_usuario"] == '2'){ ?>
						<li <?php if( $pagina == 'cliente' ) { echo "class='active'"; } ?> >
							<a href="<?php echo HOME_URI;?>/cliente/"><i class="fa fa-fw fa-bar-chart-o"></i><b> Clientes </b></a>
						</li>                     
						<li <?php if( $pagina == 'servicos' ) { echo "class='active'"; } ?> > 
							<a href="<?php echo HOME_URI;?>/servicos/"><i class="fa fa-fw fa-bar-chart-o"></i> <b>Serviços </b></a>
						</li>
					<?php    } ?>


                    
						<li <?php if( $pagina == 'campeonato' ) { echo "class='active'"; } ?> > 
							<a href="<?php echo HOME_URI;?>/campeonato/"><i class="fa fa-fw fa-bar-chart-o"></i> <b> Gerar Campeonato </b></a>
						</li>				
					

                <?php } ?>    					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
			<?php if ( $this->logged_in ) { ?> <!-- verifica se está logado. -->
			<!-- <p align='Right'><span >  Esta sessão vai expirar em: </span><span id="sessao">10:00</span> &nbsp; &nbsp;</p> -->
			<?php } ?>	
        </nav>
          <div id="page-wrapper">

            <div class="container-fluid">

                </div>  
                <div class="row">
				<p>
				<br>
                </div> 			