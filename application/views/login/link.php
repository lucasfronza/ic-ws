        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-primary">
                        <!-- <div class="panel-heading">
                            Cadastro
                        </div> -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                            	ASSOCIAR FACEBOOK À UMA CONTA EXISTENTE
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        	<form action="<?=site_url('login/fb_link')?>" method="post" role="form" id="form-login" onsubmit="return validate_login();">
				  
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
													<button type="submit" class="btn btn-primary">Associar</button>
													<a href="<?=site_url('login/password_recovery')?>" class="btn btn-default">Esqueci a senha</a>
												</div>
											</form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
                                            	NÃO POSSUO CADASTRO E DESEJO ME CADASTRAR
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                        	<form action="<?=site_url('signup/insert_user')?>" method="post" role="form" id="form-signup" onsubmit="return validate_signup();">
			  
												<input type="hidden" class="form-control" id="facebookEmail" name="facebookEmail" value="<?=$user_profile['email']?>">

										        <div class="form-group" id="groupName">
										            <label>Nome</label>
										            <input type="text" class="form-control" id="name" name="name" value="<?=$user_profile['first_name']?>">
										            <p id="errorName" class="help-block"></p>
										        </div>
										                
										        <div class="form-group" id="groupSurname">
										            <label>Sobrenome</label>
										            <input type="text" class="form-control" id="surname" name="surname" value="<?=$user_profile['last_name']?>">
										            <p id="errorSurname" class="help-block"></p>
										        </div>
										                
										        <div class="form-group" id="groupEmail">
										            <label>Email</label>
										            <input type="text" class="form-control" id="email" name="email" value="<?=$user_profile['email']?>">
										            <p id="errorEmail" class="help-block"></p>
										        </div>
										                
										        <div class="form-group" id="groupPhone">
										            <label>Celular</label>
										            <input type="text" class="form-control" id="phone" name="phone">
										        </div>
										        
										        <div class="form-group" id="groupCEP">
										            <label>CEP</label>
										            <input class="form-control" id="CEP" name="CEP" onblur="consultacep(this.value)">
										            <p class="help-block">
										            	<i class="fa fa-spinner fa-spin" style="display:none" id="spinner"></i>
										            </p>
										        </div>

										        <div class="form-group" id="groupAddress">
										            <label>Endereço</label>
										            <input type="text" class="form-control" id="address" name="address">
										        </div>
										        
										        <div class="form-group" id="groupCity">
										            <label>Cidade</label>
										            <input type="text" class="form-control" id="city" name="city">
										        </div>

										         <div class="form-group" id="groupState">
										            <label>Estado</label>
										            <input type="text" class="form-control" id="state" name="state">
										        </div>       
									        
									        	<hr>
											  	<div class="form-group">
											  		<button type="submit" class="btn btn-primary">Cadastrar</button>
											  	</div>
											</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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

    <!-- CEP -->
    <script src="<?=base_url('static/resources/cep.js')?>"></script>

</body>

</html>