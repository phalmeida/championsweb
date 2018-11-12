<?php if ( ! defined('ABSPATH')) exit; ?>



<div class="wrap">



<?php

if ( $this->logged_in ) {

	

				$goto_url = '/campeonato/principal/';



				// Redireciona para a página

				echo '<meta http-equiv="Refresh" content="0; url=' . $goto_url . '">';

				echo '<script type="text/javascript">window.location.href = "' . $goto_url . '";</script>';

				header( 'location: ' . $goto_url );

}

?>



			<div class="row">

				<div class="col-sm-6 col-md-4 col-md-offset-4">

					<h1 class="text-center login-title">Games Vila</h1>

					<div class="account-wall">

						<img class="profile-img" src="<?php echo HOME_URI;?>/views/_images/photo.png?sz=120"

							alt="">

						<form method="post" class="form-signin">

						<input type="text" name="userdata[usuario]" class="form-control" placeholder="Email" required autofocus>

						<input type="password" name="userdata[senha_usuario]" class="form-control" placeholder="Senha" required>

						<button class="btn btn-lg btn-primary btn-block" type="submit">

							Entrar 

						</button>

						</form>

						<?php

							if ( $this->login_error ) {

								echo '<div class="alert alert-danger" role="alert"> <p class="text-center"><b>' . $this->login_error . '</b><p></div>';

							}

						?>	

					</div>



				</div>

			</div>	

</div> <!-- .wrap -->