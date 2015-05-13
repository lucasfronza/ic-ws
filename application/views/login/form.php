        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                	<h1 class="page-header">Login</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <?php if($message == "signup_success"): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Cadastro efetuado com sucesso!
                        </div>
                    <?php elseif ($message == "email_not_found"): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Email não encontrado!
                        </div>
                    <?php elseif ($message == "wrong_pass"): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Senha inválida!
                        </div>
                    <?php elseif ($message == "password_recovery"): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Erro ao recuperar senha!
                        </div>
                    <?php elseif ($message == "reset_success"): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Você receberá um email com a nova senha!
                        </div>
                    <?php elseif ($message == "logout_success"): ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Você saiu do sistema!
                        </div>
                    <?php elseif ($message != ""): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Erro!
                        </div>
                    <?php endif; ?>
					<form action="<?=site_url('login/authenticate')?>" method="post" role="form" id="form-login" onsubmit="return validate_login();">
						  
				        <div class="form-group" id="groupEmail">
				            <label>Email</label>
				            <input type="text" class="form-control" id="email" name="email">
				            <p id="errorEmail" class="help-block"></p>
				        </div>
			                
				        <div class="form-group" id="groupPassword">
				            <label>Senha</label>
				            <input type="password" class="form-control" id="password" name="password">
				        </div> 
			        
			        	<hr>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Entrar</button>
							<a href="<?=site_url('login/password_recovery')?>" class="btn btn-default">Esqueci a senha</a>
						</div>

					</form>
					<?php if (!@$user_profile): ?>
						<div>
                            <a class="btn btn-primary" href="<?= $login_url ?>" rel="nofollow" style="background-color: #3b5998;">
                                <i class="fa fa-facebook"></i>
                                Login com Facebook
                            </a>
				        </div>
			    	<?php endif ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Social Buttons CSS -->
    <link href="<?=base_url('static/css/plugins/social-buttons.css')?>" rel="stylesheet">

    <!-- jQuery Version 1.11.0 -->
    <script src="<?=base_url('static/js/jquery-1.11.0.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('static/js/plugins/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('static/js/sb-admin-2.js')?>"></script>

    <!-- Form validation -->
    <script src="<?=base_url('static/resources/validation.js')?>"></script>

</body>

</html>