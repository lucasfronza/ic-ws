	
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			   <h3 class="panel-title">MEU CADASTRO</h3>
		  </div>
		  <div class="panel-body">
			
			<form action="<?=site_url('profile/update')?>" method="post" class="form-horizontal" role="form" id="form-profileupdate" onsubmit="return validate_profileupdate();">
			  
        <div class="form-group" id="groupName">
            <label for="name" class="col-sm-3 control-label">Nome</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user->name; ?>">
            </div>
            <div class="col-sm-4">
                <span id="errorName" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupSurname">
            <label for="surname" class="col-sm-3 control-label">Sobrenome</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="surname" name="surname" value="<?= $user->surname; ?>">
            </div>
            <div class="col-sm-4">
                <span id="errorSurname" class="help-block"></span>
            </div>
        </div>

        <div class="form-group" id="groupPassword">
            <label for="password" class="col-sm-3 control-label">Senha</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-sm-4">
                <span id="errorPassword" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupPasswordChecker">
            <label for="passwordChecker" class="col-sm-3 control-label">Repetir senha</label>
            <div class="col-sm-7">
                <input type="password" class="form-control" id="passwordChecker" name="passwordChecker" onblur="validate_password_edit()">
            </div>
            <div class="col-sm-4">
                <span id="errorPasswordChecker" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupEmail">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="email" name="email" value="<?= $user->email; ?>" readonly>
            </div>
            <div class="col-sm-4">
                <span id="errorEmail" class="help-block"></span>
            </div>
        </div>
                
        <div class="form-group" id="groupPhone">
            <label for="phone" class="col-sm-3 control-label">Celular</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone; ?>">
            </div>
        </div>
                
        <div class="form-group" id="groupAddress">
            <label for="address" class="col-sm-3 control-label">Endereço</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="address" name="address" value="<?= $user->address; ?>">
            </div>
        </div>
        
        <div class="form-group" id="groupCity">
            <label for="city" class="col-sm-3 control-label">Cidade</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="city" name="city" value="<?= $user->city; ?>">
            </div>
        </div>

         <div class="form-group" id="groupState">
            <label for="state" class="col-sm-3 control-label">Estado</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="state" name="state" value="<?= $user->state; ?>">
            </div>
        </div>       
        
        
        <hr>
			  <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-offset-2">Salvar alterações</button>
                <a href="<?=site_url('profile')?>" class="btn btn-default">Voltar</a>
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