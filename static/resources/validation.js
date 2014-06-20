function validate_signup()
{
	var erro = false;
    
	var name = $("#form-signup input[name=name]").val();
	$("#form-disciplina #groupName").removeClass('has-error');
	$("#form-disciplina #errorName").html('');
    
    var pass1 = $("#form-signup input[name=password]").val();
    $("#form-signup #groupPassword").removeClass('has-error');
	$("#form-signup #errorPassword").html('');
    
    var pass2 = $("#form-signup input[name=passwordChecker]").val();
    $("#form-signup #groupPasswordChecker").removeClass('has-error');
	$("#form-signup #errorPasswordChecker").html('');
    
    var email = $("#form-signup input[name=email]").val();
	$("#form-signup #groupEmail").removeClass('has-error');
	$("#form-signup #errorEmail").html('');
	
    if(name.length == 0)
	{
		$("#form-signup #groupName").addClass('has-error');
		$("#form-signup #errorName").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(pass1.length <= 7)
	{
		$("#form-signup #groupPassword").addClass('has-error');
		$("#form-signup #errorPassword").html('No mínimo 8 dígitos.');			
		erro = true;
	}
    
    if(pass1 != pass2)
	{
		$("#form-signup #groupPassword").addClass('has-error');
        
        $("#form-signup #groupPasswordChecker").addClass('has-error');
		$("#form-signup #errorPasswordChecker").html('Senhas não conferem.');
		erro = true;
	}
    
    if(email.length == 0)
	{
		$("#form-signup #groupEmail").addClass('has-error');
		$("#form-signup #errorEmail").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
	return !erro;
}

function validate_password()
{
	var erro = false;
    
    var pass1 = $("#form-signup input[name=password]").val();
    $("#form-signup #groupPassword").removeClass('has-error');
	$("#form-signup #errorPassword").html('');
    
    var pass2 = $("#form-signup input[name=passwordChecker]").val();
    $("#form-signup #groupPasswordChecker").removeClass('has-error');
	$("#form-signup #errorPasswordChecker").html('');
    
    if(pass1.length <= 7)
	{
		$("#form-signup #groupPassword").addClass('has-error');
		$("#form-signup #errorPassword").html('No mínimo 8 dígitos.');			
		erro = true;
	}
    
    if(pass1 != pass2)
	{
		$("#form-signup #groupPassword").addClass('has-error');
        
        $("#form-signup #groupPasswordChecker").addClass('has-error');
		$("#form-signup #errorPasswordChecker").html('Senhas não conferem.');
		erro = true;
	}
    
	return !erro;
}

function validate_login()
{
	var erro = false;
    
    var email = $("#form-login input[name=email]").val();
    $("#form-login #groupEmail").removeClass('has-error');
	$("#form-signup #errorEmail").html('');
    
    if(email.length == 0)
	{
		$("#form-login #groupEmail").addClass('has-error');
		$("#form-login #errorEmail").html('Email vazio.');			
		erro = true;
	}
    
	return !erro;
}
