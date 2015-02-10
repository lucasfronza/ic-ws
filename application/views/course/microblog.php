		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	<i class="fa fa-comments fa-fw"></i> Microblog
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
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
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url('static/js/jquery-1.11.0.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('static/js/plugins/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('static/js/sb-admin-2.js')?>"></script>

</body>

</html>