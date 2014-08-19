
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
			
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-comments fa-fw"></i> Microblog
                    </div>
                    
                    <div class="panel-body">
                    	<form action="<?=site_url('course/microblog_insert')?>" method="post">
	                        <div class="input-group">
	                            <input name="message" type="text" class="form-control input-sm" placeholder="Escreva sua mensagem aqui...">
	                            <input name="idCourse" type="hidden" value="<?=$idCourse?>">
	                            <span class="input-group-btn">
	                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
	                                    Enviar
	                                </button>
	                            </span>
	                        </div>
						</form>
                        <hr>

                        <div class="list-group">
                        	<?php if (empty($messages)): ?>
								<p style="text-align:center;">Nenhuma postagem.</p>
							<?php else: ?>

	                        	<?php foreach ($messages as $item): ?>
									<div class="list-group-item">
		                                <i class="fa fa-comment fa-fw"></i> <?=$item->message?>
		                                <span class="pull-right text-muted small"><em>por <?=$item->name.' '.$item->surname?></em>
		                                </span>
		                            </div>

								<?php endforeach ?>
							<?php endif; ?>
                        </div>
                        
                    </div>
                    
                </div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
    	<script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
    	
  
	</body>
</html>