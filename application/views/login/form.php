<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?=base_url('static/resources/bootstrap.min.css')?>" rel="stylesheet">
	  <title>Login</title>
  </head>

  <body>
	
    <div class="navbar navbar-inverse" role="navigation">
      <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?=site_url()?>">Menu</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
        <li><a href="<?=site_url("signup")?>">CADASTRO</a></li>
        <li class="active"><a href="<?=site_url("login")?>">LOGIN</a></li>
        </ul>
      </div>
      </div>
    </div>
	
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
		  </div>
		</div>
		
	  </div>
	</div>
		
    <script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    <script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('static/resources/validation.js')?>"></script>
  

</body></html>