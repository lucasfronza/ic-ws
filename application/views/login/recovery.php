
	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			   <h3 class="panel-title">LOGIN</h3>
		  </div>
		  <div class="panel-body">
			
			<form action="<?=site_url('login/password_reset')?>" method="post" class="form-horizontal" role="form" id="form-signup">
			  
        <div class="form-group" id="groupEmail">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div> 
        
        <hr>
			  <div class="form-group">
				  <div class="col-sm-offset-2 col-sm-5">
				    <button type="submit" class="btn btn-primary">Recuperar senha</button>
                    <a href="<?=site_url('login')?>" class="btn btn-default">Cancelar</a>
				  </div>
			  </div>
			</form>
		  </div>
		</div>
		
	  </div>
	</div>
		
    <script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    <script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
  

</body></html>