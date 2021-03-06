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
                    	<?php if (empty($topics)): ?>
							<p style="text-align:center;">Nenhuma postagem.</p>
						<?php else: ?>
                            <div class="panel-group" id="accordion">
                                <?php $index = 1; ?>
                                <?php foreach ($topics as $topic): ?>
                                    <?php if ($topic->parent == 0): ?>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="<?=site_url('course/microblogTopic/'.$idCourse.'/'.$topic->id)?>">
                                                        <?=$topic->message?>
                                                    </a>
                                                    <?php if($this->session->userdata('id') == $topic->idUser ||$this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                                    <span class="pull-right text-muted" style="margin-left:15px">
                                                        <a href="<?=site_url('course/microblogRemoveMessage/'.$idCourse.'/'.$topic->id)?>"><i class="fa fa-trash-o"></i></a>
                                                    </span>
                                                    <?php endif; ?>
                                                    <span class="pull-right text-muted" style="margin-left:15px">
                                                        <!-- <a href="<?=site_url('course/microblogUpvote/'.$idCourse.'/'.$topic->id)?>"><i class="fa fa-thumbs-o-up"></i></a> <span class="badge"><?=$topic->upvotes?></span> -->
                                                        <a onclick="microblogUpvote(<?=$idCourse?>, <?=$topic->id?>, this)"><i class="fa fa-thumbs-o-up"></i></a> <span class="badge"><?=$topic->upvotes?></span>
                                                    </span>
                                                    <span class="pull-right text-muted small"><em><i class="fa fa-comment"></i> <?=$topic->name.' '.$topic->surname?></em></span>
                                                </h4>
                                            </div>
                                            <!-- <div id="collapse<?=$index?>" class="panel-collapse collapse" style="height: 0px;">
                                                <div class="panel-body">
                                                    <?php foreach ($messages as $item): ?>
                                                        <?php if ($item->parent == $topic->id): ?>
                                                            <div class="list-group-item" style="padding-bottom: 20px; padding-top: 16px">
                                                                <?=nl2br($item->message)?>
                                                                <?php if($this->session->userdata('id') == $item->idUser || $this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                                                <span class="pull-right text-muted" style="margin-left:15px">
                                                                    <a href="<?=site_url('course/microblogRemoveMessage/'.$idCourse.'/'.$item->id)?>"><i class="fa fa-trash-o"></i></a>
                                                                </span>
                                                                <?php endif; ?>
                                                                <span class="pull-right text-muted" style="margin-left:15px"> -->
                                                                    <!-- <a href="<?=site_url('course/microblogUpvote/'.$idCourse.'/'.$item->id)?>"><i class="fa fa-thumbs-o-up"></i></a> <span class="badge"><?=$item->upvotes?></span> -->
                                                                    <!-- <a onclick="microblogUpvote(<?=$idCourse?>, <?=$topic->id?>, this)"><i class="fa fa-thumbs-o-up"></i></a> <span class="badge"><?=$topic->upvotes?></span>
                                                                </span>
                                                                <span class="pull-right text-muted small"><em><i class="fa fa-comment"></i> <?=$item->name.' '.$item->surname?></em></span>
                                                            </div>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                    <p></p>
                                                    <form action="<?=site_url('course/microblog_insert')?>" method="post" role="form">
                                                        <div class="form-group">
                                                            <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                                                            <input name="idCourse" type="hidden" value="<?=$idCourse?>">
                                                            <input name="parent" type="hidden" value="<?=$topic->id?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-warning pull-right">Enviar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> -->
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

    <!-- Microblog -->
    <script type="text/javascript">
    function microblogUpvote(idCourse, idTopic, element) {

        $.ajax({
            url: '<?=site_url("course/microblogUpvote/")?>/'+idCourse+'/'+idTopic,
            type: 'post',
            success: function(result)
            {
                var json = JSON.parse(result);
                $(element).siblings(".badge").html(json.upvotes);
            }
        });
    }
    </script>

</body>

</html>