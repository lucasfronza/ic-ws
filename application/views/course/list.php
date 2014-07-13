
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				MINHAS TURMAS
				<span class='col-md-offset-6'><a class='btn btn-primary' href='<?=site_url('course/create')?>'> <span class='glyphicon glyphicon-plus'></span> Nova Turma </a></span>
			  </div>
			  <div class="panel-body">
				
				<table class="table table-hover">
					<thead>
						<tr>
							<th> CÓDIGO </th> 
							<th> NOME </th>
							<th> GERENCIAR </th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($courses as $item): ?>
						<tr>
							<td><?=$item->code?></td>
							<td><?=$item->name?></td>
							<td><a class="btn btn-primary" href='<?=site_url("course/manage/".$item->id)?>'><span class="glyphicon glyphicon-hand-up"></span></a></td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
                  
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    	<script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    	
  
	</body>
</html>