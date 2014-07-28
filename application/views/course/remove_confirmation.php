
		
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
			
			<div class="panel panel-danger">
			  <div class="panel-heading">
				CONFIRMA&Ccedil;&Atilde;O DE EXCLUS&Atilde;O
			  </div>
			  <div class="panel-body">
				<p style='text-align: justify'> Tem certeza que deseja excluir a turma <?=$course->name?> ? 
        		<p align="center"> <a class='btn btn-primary' href='<?=site_url('course/delete/'.$course->id)?>'> SIM </a>
        		<a class='btn btn-default' href='<?=site_url('course/manage/'.$course->id)?>'> NÃO </a>
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    	<script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    	
  
	</body>
</html>