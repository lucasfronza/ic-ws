		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        	<i class="fa fa-comments fa-fw"></i> Microblog
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-8">
	                <form action="<?=site_url('course/microblog_insert')?>" method="post">
                        <div class="input-group">
                            <input name="message" type="text" class="form-control input-sm" placeholder="Criar novo tópico...">
                            <input name="idCourse" type="hidden" value="<?=$idCourse?>">
                            <input name="parent" type="hidden" value="0">
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
                            <div class="panel-group" id="accordion">
                                <?php $index = 1; ?>
                                <?php foreach ($messages as $topic): ?>
                                    <?php if ($topic->parent == 0): ?>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$index?>" class="collapsed">
                                                        <?=$topic->message?>
                                                    </a>
                                                    <span class="pull-right text-muted" style="margin-left:15px">
                                                        <a href="<?=site_url('course/microblogUpvote/'.$idCourse.'/'.$topic->id)?>"><i class="fa fa-thumbs-o-up"></i></a> <span class="badge"><?=$topic->upvotes?></span>
                                                    </span>
                                                    <span class="pull-right text-muted small"><em><i class="fa fa-comment"></i> <?=$topic->name.' '.$topic->surname?></em></span>
                                                </h4>
                                            </div>
                                            <div id="collapse<?=$index?>" class="panel-collapse collapse" style="height: 0px;">
                                                <div class="panel-body">
                                                    <?php foreach ($messages as $item): ?>
                                                        <?php if ($item->parent == $topic->id): ?>
                                                            <div class="list-group-item">
                                                                <?=$item->message?>
                                                                <span class="pull-right text-muted small"><em><i class="fa fa-comment"></i> <?=$item->name.' '.$item->surname?></em></span>
                                                            </div>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                    <p></p>
                                                    <form action="<?=site_url('course/microblog_insert')?>" method="post">
                                                        <div class="input-group">
                                                            <input name="message" type="text" class="form-control input-sm" placeholder="Escreva sua resposta aqui...">
                                                            <input name="idCourse" type="hidden" value="<?=$idCourse?>">
                                                            <input name="parent" type="hidden" value="<?=$topic->id?>">
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
                                    <?php endif ?>
                                    <?php $index = $index + 1; ?>
    							<?php endforeach ?>
                            </div>
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