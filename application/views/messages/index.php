        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mensagens</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i>
                            <?=$name?>
                            <div class="btn-group pull-right">
                                <a href="<?=site_url('messages/user/'.$idTo)?>" class="btn btn-default btn-xs">
                                    <i class="fa fa-refresh fa-fw"></i>
                                </a>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <?php if (empty($messages)): ?>
                                    <p>Nenhuma mensagem.</p>
                                <?php else: ?>
                                    <?php $last = 0; ?>
                                    <?php foreach ($messages as $item): ?>
                                        <?php if ($last != $item->idTo && $last != 0): ?>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($last != $item->idTo): ?>
                                            <li class="left clearfix">
                                                <span class="chat-img pull-left">
                                                    <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle">
                                                </span>
                                                <div class="chat-body clearfix">
                                                    <div class="header">
                                                        <strong class="primary-font"><?=$item->name.' '.$item->surname?></strong>
                                                        <small class="pull-right text-muted">
                                                            <i class="fa fa-clock-o fa-fw"></i> <?=$item->datetime?>
                                                        </small>
                                                    </div>
                                                    <p>
                                                        <?=$item->message?>
                                                    </p>
                                        <?php else: ?>
                                                    <p>
                                                        <?=$item->message?>
                                                    </p>
                                        <?php endif; ?>
                                        <?php $last = $item->idTo; ?>
                                        
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
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
                        <!-- /.panel-footer -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?=base_url('static/js/jquery-1.11.0.js')?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('static/js/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('static/js/plugins/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('static/js/sb-admin-2.js')?>"></script>

    <!-- Form validation -->
    <script src="<?=base_url('static/resources/validation.js')?>"></script>

    <!-- CEP -->
    <script src="<?=base_url('static/resources/cep.js')?>"></script>

</body>

</html>