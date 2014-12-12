
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				REPOSITÓRIO
                <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-default col-md-offset-7">Voltar</a>

			  </div>
              <div class="panel-body">
                  <form action="<?=site_url('course/uploadFile/'.$idCourse)?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form" id="form-upload">
                      <div class="form-group" id="groupFile">
                        <label for="userfile" class="col-sm-2 control-label">Arquivo</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" id="userfile" name="userfile">
                        </div>
                     
                      <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Fazer Upload</button>
                      </div>
                  </div>
			     </form>
              </div>
              <hr>
			  <div class="panel-body">
               <?php if (empty($files)): ?>
                <p style="text-align:center;">Repositório vazio.</p>
               <?php else: ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th> ARQUIVO </th> 
							<th> CRIADO POR </th>
							<th> MODIFICADO </th>
							<th> TAMANHO </th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($files as $item): ?>
						<tr>
							<td><a href="<?=$item->path?>"><?=$item->name?></a></td>
							<td><?=$item->uploadedBy?></td>
							<td>
								<?php
									$time = strtotime($item->modified);
									echo date('d-m-Y H:i:s', $time);
								?>
							</td>
							<td><?=$item->size?> KB</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
               <?php endif; ?>
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    	<script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    	
  
	</body>
</html>