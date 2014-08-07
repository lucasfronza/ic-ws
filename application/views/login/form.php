
	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			   <h3 class="panel-title">LOGIN</h3>
		  </div>
		  <div class="panel-body">
			
			<form action="<?=site_url('login/authenticate')?>" method="post" class="form-horizontal" role="form" id="form-login" onsubmit="return validate_login();">
			  
        <div class="form-group" id="groupEmail">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="col-sm-4">
                <span id="errorEmail" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupPassword">
            <label for="password" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div> 
        
        <hr>
			  <div class="form-group">
				  <div class="col-sm-offset-2 col-sm-5">
				    <button type="submit" class="btn btn-primary">Entrar</button>
                    <a href="<?=site_url('login/password_recovery')?>" class="btn btn-default">Esqueci a senha</a>
				  </div>
			  </div>
			</form>
			<?php if (!@$user_profile): ?>
				<div class="form-group col-sm-offset-2" style="width: 100px">
			  		<a class="btn btn-block btn-social btn-facebook" href="<?= $login_url ?>" rel="nofollow">
			          <i class="fa fa-facebook"></i>
			          Login
			        </a>
		        </div>
	    	<?php endif ?>
		  </div>
		</div>
		
	  </div>
	</div>
		
    <script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    <script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('static/resources/validation.js')?>"></script>
  

</body></html>