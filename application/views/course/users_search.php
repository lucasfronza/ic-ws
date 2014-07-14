
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				RESULTADO DA BUSCA
			  </div>
			  <div class="panel-body">
				
                  <?php if (empty($search)): ?>
                  <p style="text-align:center;">Nenhum usuário encontrado.</p>
                  <?php else: ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> NOME COMPLETO </th>
                                <th> EMAIL </th>
                                <th> ADICIONAR </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($search as $item): ?>
                            <tr>
                                <td><?=$item->name?> <?=$item->surname?></td>
                                <td><?=$item->email?></td>
                                <td><a class="btn btn-primary" href="<?=site_url('course/addUser/'.$idCourse.'/'.$item->id)?>"><span class="glyphicon glyphicon-ok"></span></a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                  
                  
			  </div>
			</div>
                
            <div class="panel panel-default">
			  <div class="panel-heading">
				PARTICIPANTES
			  </div>
			  <div class="panel-body">
				
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> NOME COMPLETO </th>
                                <th> EMAIL </th>
                                <th> REMOVER </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($linkedUsers as $item): ?>
                            <tr>
                                <td><?=$item->name?> <?=$item->surname?></td>
                                <td><?=$item->email?></td>
                                <td><a class="btn btn-danger" href="<?=site_url('course/removeUser/'.$idCourse.'/'.$item->id)?>"><span class="glyphicon glyphicon-remove"></span></a></td>
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