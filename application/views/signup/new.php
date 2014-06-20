	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			   <h3 class="panel-title">CADASTRO</h3>
		  </div>
		  <div class="panel-body">
			
			<form action="<?=site_url('signup/insert_user')?>" method="post" class="form-horizontal" role="form" id="form-signup" onsubmit="return validate_signup();">
			  
        <div class="form-group" id="groupName">
            <label for="name" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-sm-4">
                <span id="errorName" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupSurname">
            <label for="surname" class="col-sm-2 control-label">Sobrenome</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
            <div class="col-sm-4">
                <span id="errorSurname" class="help-block"></span>
            </div>
        </div>

        <div class="form-group" id="groupPassword">
            <label for="password" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-sm-4">
                <span id="errorPassword" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupPasswordChecker">
            <label for="passwordChecker" class="col-sm-2 control-label">Repetir senha</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="passwordChecker" name="passwordChecker" onblur="validate_password()">
            </div>
            <div class="col-sm-4">
                <span id="errorPasswordChecker" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupEmail">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="col-sm-4">
                <span id="errorEmail" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupPhone">
            <label for="phone" class="col-sm-2 control-label">Celular</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
                
        <div class="form-group" id="groupAddress">
            <label for="address" class="col-sm-2 control-label">Endereço</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="address" name="address">
            </div>
        </div>
        
        <div class="form-group" id="groupCity">
            <label for="city" class="col-sm-2 control-label">Cidade</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="city" name="city">
            </div>
        </div>

         <div class="form-group" id="groupState">
            <label for="state" class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="state" name="state">
            </div>
        </div>       
        
        
        <hr>
			  <div class="form-group">
				  <div class="col-sm-offset-2 col-sm-3">
				    <button type="submit" class="btn btn-primary">Cadastrar</button>
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