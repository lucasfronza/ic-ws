<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
			<div class="col-md-offset-4 col-md-4">
			
			<div class="panel panel-success">
			  <div class="panel-heading">
				SEJA BEM-VINDO
			  </div>
			  <div class="panel-body">
				<p style='text-align: justify'> Login efetuado com sucesso! 
        		<p align="center"> <a class='btn btn-primary' href='<?=site_url('')?>'> OK </a>
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    	<script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    	
	</body>
</html>