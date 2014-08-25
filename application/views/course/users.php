
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
                
            <div class="panel panel-default">
			  <div class="panel-heading">
				PARTICIPANTES
                <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-default col-md-offset-7">Voltar</a>
			  </div>
			  <div class="panel-body">
				
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> USUÁRIO </th>
                                <th> EMAIL </th>
                                <th> REMOVER </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($linkedUsers as $item): ?>
                            <tr>
                                <td><a href="<?=site_url('profile/user/'.$item->idUser)?>"><i class="fa fa-eye"></i></a>
                                    <a href="<?=site_url('messages/user/'.$item->idUser)?>"><i class="fa fa-envelope"></i></a>
                                    <?=$item->name?> <?=$item->surname?></td>
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