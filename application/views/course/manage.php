        <div class="row">
			<div class="col-md-offset-3 col-md-3">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				TURMA
                  <div>
                    <a href="<?=site_url('course/edit/'.$course->id)?>" class="btn btn-default" >Alterar dados</a>
                    <a href="<?=site_url('course/remove/'.$course->id)?>" class="btn btn-danger" >Excluir turma</a>
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownTurma" data-toggle="dropdown">
                        Mais opções
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownTurma">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/repo/'.$course->id)?>">Repositório</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?=site_url('course/users/'.$course->id)?>">Participantes</a></li>
                      </ul>
                    </div>
                  </div>
			  </div>
			  <div class="panel-body">
				
				<table class="table table-hover">
						<tr>
							<th style="text-align:right;"> Nome </th>
							<td> <?php echo $course->name; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Código </th>
							<td> <?php echo $course->code; ?> </td>
						</tr>
						<tr>
							<th style="text-align:right;"> Créditos </th>
							<td> <?php echo $course->credits; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Horário </th>
							<td> <?php echo $course->time; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Descrição </th>
							<td> <?php echo $course->description; ?> </td>
						</tr>
				</table>
	
				
			  </div>
			</div>
			
		  </div>
		
			<div class="col-md-3">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				ADICIONAR PARTICIPANTES
			  </div>
			  <div class="panel-body">
                  <form action="<?=site_url('course/usersSearch/'.$course->id)?>" method="post" class="form-horizontal" role="form" id="form-course">
			  
                    <div class="form-group" id="groupName">
                        <label for="name" class="col-sm-4 control-label">Nome</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                      
                    <div class="form-group" id="groupSurname">
                        <label for="surname" class="col-sm-4 control-label">Sobrenome</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="surname" name="surname">
                        </div>
                    </div>
        
                    <hr>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        <a href="<?=site_url('course/users/'.$course->id)?>" class="btn btn-default">Visualizar todos</a>
                      </div>
                    </div>
			      </form>
				
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
	    <script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
	</body>
</html>