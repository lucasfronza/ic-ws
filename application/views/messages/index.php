        <div class="row">
			<div class="col-md-offset-4 col-md-3">
			
			<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            <?=$name?>
                            <div class="btn-group pull-right">
                                <a href="<?=site_url('messages/user/'.$idTo)?>" class="btn btn-default btn-xs">
                                    <i class="fa fa-refresh fa-fw"></i> Atualizar
                                </a>
                            </div>
                        </div>
                        
                        <div class="panel-body">
                            	<?php if (empty($messages)): ?>
                            		<p>Nenhuma mensagem.</p>
								<?php else: ?>
									<?php $last = 0; ?>
									<?php foreach ($messages as $item): ?>
                                        <div>
                                        	<?php if ($last != $item->idTo): ?>
                                            	<strong class="primary-font"><?=$item->name.' '.$item->surname?></strong>
                                            <?php endif; ?>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?=$item->datetime?>
                                            </small>
                                        </div>
                                        <p>
                                        	<?=$item->message?>
                                        </p>
		                                <hr>
		                                <?php $last = $item->idTo; ?>
		                            <?php endforeach ?>
		                        <?php endif; ?>
                        </div>
                        <div class="panel-footer">
                        	<form action="<?=site_url('messages/insert')?>" method="post">
	                        <div class="input-group">
	                            <input name="message" type="text" class="form-control input-sm" placeholder="Escreva sua mensagem aqui...">
	                            <input name="idTo" type="hidden" value="<?=$idTo?>">
	                            <span class="input-group-btn">
	                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
	                                    Enviar
	                                </button>
	                            </span>
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