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

    var emailChecker = $("#form-signup input[name=emailChecker]").val();
    $("#form-signup #groupEmailChecker").removeClass('has-error');
    $("#form-signup #errorEmailChecker").html('');
	
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

    if(email != emailChecker)
    {
        $("#form-signup #groupEmail").addClass('has-error');
        
        $("#form-signup #groupEmailChecker").addClass('has-error');
        $("#form-signup #errorEmailChecker").html('Emails não conferem.');
        erro = true;
    }
    
	return !erro;
}

function validate_profileupdate()
{
	var erro = false;
    
	var name = $("#form-profileupdate input[name=name]").val();
	$("#form-disciplina #groupName").removeClass('has-error');
	$("#form-disciplina #errorName").html('');
    
    var pass1 = $("#form-profileupdate input[name=password]").val();
    $("#form-profileupdate #groupPassword").removeClass('has-error');
	$("#form-profileupdate #errorPassword").html('');
    
    var pass2 = $("#form-profileupdate input[name=passwordChecker]").val();
    $("#form-profileupdate #groupPasswordChecker").removeClass('has-error');
	$("#form-profileupdate #errorPasswordChecker").html('');
    
    var email = $("#form-profileupdate input[name=email]").val();
	$("#form-profileupdate #groupEmail").removeClass('has-error');
	$("#form-profileupdate #errorEmail").html('');

    var emailChecker = $("#form-profileupdate input[name=emailChecker]").val();
    $("#form-profileupdate #groupEmailChecker").removeClass('has-error');
    $("#form-profileupdate #errorEmailChecker").html('');
	
    if(name.length == 0)
	{
		$("#form-profileupdate #groupName").addClass('has-error');
		$("#form-profileupdate #errorName").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(pass1.length >=1 && pass1.length <= 7)
	{
		$("#form-profileupdate #groupPassword").addClass('has-error');
		$("#form-profileupdate #errorPassword").html('No mínimo 8 dígitos.');			
		erro = true;
	}
    
    if(pass1 != pass2)
	{
		$("#form-profileupdate #groupPassword").addClass('has-error');
        
        $("#form-profileupdate #groupPasswordChecker").addClass('has-error');
		$("#form-profileupdate #errorPasswordChecker").html('Senhas não conferem.');
		erro = true;
	}
    
    if(email.length == 0)
	{
		$("#form-profileupdate #groupEmail").addClass('has-error');
		$("#form-profileupdate #errorEmail").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}

    if(email != emailChecker)
    {
        $("#form-profileupdate #groupEmail").addClass('has-error');
        
        $("#form-profileupdate #groupEmailChecker").addClass('has-error');
        $("#form-profileupdate #errorEmailChecker").html('Emails não conferem.');
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
	
	if(pass1 == pass2 && pass1.length >= 8)
	{
		$("#form-signup #groupPassword").addClass('has-success');
        
        $("#form-signup #groupPasswordChecker").addClass('has-success');
	}
    
	return !erro;
}

function validate_password_edit()
{
	var erro = false;
    
    var pass1 = $("#form-profileupdate input[name=password]").val();
    $("#form-profileupdate #groupPassword").removeClass('has-error');
	$("#form-profileupdate #errorPassword").html('');
    
    var pass2 = $("#form-profileupdate input[name=passwordChecker]").val();
    $("#form-profileupdate #groupPasswordChecker").removeClass('has-error');
	$("#form-profileupdate #errorPasswordChecker").html('');
    
    if(pass1.length >=1 && pass1.length <= 7)
	{
		$("#form-profileupdate #groupPassword").addClass('has-error');
		$("#form-profileupdate #errorPassword").html('No mínimo 8 dígitos.');			
		erro = true;
	}
    
    if(pass1 != pass2)
	{
		$("#form-profileupdate #groupPassword").addClass('has-error');
        
        $("#form-profileupdate #groupPasswordChecker").addClass('has-error');
		$("#form-profileupdate #errorPasswordChecker").html('Senhas não conferem.');
		erro = true;
	}

	if(pass1 == pass2 && pass1.length >= 8)
	{
		$("#form-profileupdate #groupPassword").addClass('has-success');
        
        $("#form-profileupdate #groupPasswordChecker").addClass('has-success');
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
