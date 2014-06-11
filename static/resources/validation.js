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

function validar_curso()
{
	var nome = $("#form-curso input[name=nome]").val();
	$("#form-curso #groupNome").removeClass('has-error');
	$("#form-curso #errorNome").html('');

	var erro = 0;

	if(nome.length == 0)
	{
		$("#form-curso #groupNome").addClass('has-error');
		$("#form-curso #errorNome").html('Campo Obrigat&oacute;rio.');			
		erro = 1;
	}
	
	return !erro;
}

function validar_disciplina()
{
    var erro = false;
    
	var nome = $("#form-disciplina input[name=nome]").val();
	$("#form-disciplina #groupNome").removeClass('has-error');
	$("#form-disciplina #errorNome").html('');
    
    var codigo = $("#form-disciplina input[name=codigo]").val();
    $("#form-disciplina #groupCodigo").removeClass('has-error');
	$("#form-disciplina #errorCodigo").html('');
    
    var cargaHoraria = $("#form-disciplina input[name=cargaHoraria]").val();
    $("#form-disciplina #groupCargaHoraria").removeClass('has-error');
	$("#form-disciplina #errorCargaHoraria").html('');
    
    var objetivos = $("#form-disciplina textarea[name=objetivos]").val();
    $("#form-disciplina #groupObjetivos").removeClass('has-error');
	$("#form-disciplina #errorObjetivos").html('');
    
    var programa = $("#form-disciplina textarea[name=programa]").val();
    $("#form-disciplina #groupPrograma").removeClass('has-error');
	$("#form-disciplina #errorPrograma").html('');
    
    var criteriosAvaliacao = $("#form-disciplina textarea[name=criteriosAvaliacao]").val();
    $("#form-disciplina #groupCriteriosAvaliacao").removeClass('has-error');
	$("#form-disciplina #errorCriteriosAvaliacao").html('');
    
    
    if(nome.length == 0)
	{
		$("#form-disciplina #groupNome").addClass('has-error');
		$("#form-disciplina #errorNome").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(codigo.length == 0)
	{
		$("#form-disciplina #groupCodigo").addClass('has-error');
		$("#form-disciplina #errorCodigo").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(cargaHoraria.length == 0)
	{
		$("#form-disciplina #groupCargaHoraria").addClass('has-error');
		$("#form-disciplina #errorCargaHoraria").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(objetivos.length == 0)
	{
		$("#form-disciplina #groupObjetivos").addClass('has-error');
		$("#form-disciplina #errorObjetivos").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(programa.length == 0)
	{
		$("#form-disciplina #groupPrograma").addClass('has-error');
		$("#form-disciplina #errorPrograma").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
    
    if(criteriosAvaliacao.length == 0)
	{
		$("#form-disciplina #groupCriteriosAvaliacao").addClass('has-error');
		$("#form-disciplina #errorCriteriosAvaliacao").html('Campo Obrigat&oacute;rio.');			
		erro = true;
	}
	
	return !erro;
}