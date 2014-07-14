	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
		
		<div class="panel panel-default">
		  <div class="panel-heading">
			   <h3 class="panel-title">NOVA TURMA</h3>
		  </div>
		  <div class="panel-body">
			
			<form action="<?=site_url('course/update')?>" method="post" class="form-horizontal" role="form" id="form-course">
			  
                
                <input type="hidden" name="id" value="<?=$course->id?>">
                <div class="form-group" id="groupName">
                    <label for="name" class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="name" name="name" value="<?=$course->name?>">
                    </div>
                </div>

                <div class="form-group" id="groupCode">
                    <label for="code" class="col-sm-2 control-label">Código</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="code" name="code" value="<?=$course->code?>">
                    </div>
                </div>

                <div class="form-group" id="groupCredits">
                    <label for="credits" class="col-sm-2 control-label">Créditos</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="credits" name="credits" value="<?=$course->credits?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="time" class="col-sm-2 control-label">Horário</label>
                    <div class="col-sm-5">
                        <textarea name="time" class="form-control" rows="3"><?=$course->time?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-5">
                        <textarea name="description" class="form-control" rows="5"><?=$course->description?></textarea>
                    </div>
                </div>

        
        <hr>
			  <div class="form-group">
				  <div class="col-sm-offset-2 col-sm-3">
				    <button type="submit" class="btn btn-primary">Salvar alterações</button>
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