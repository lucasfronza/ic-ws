        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wiki
                            <?php if($this->session->userdata('type') == 'administrador' || $this->session->userdata('type') == 'professor'): ?>
                                <a href="<?=site_url('course/wikiEdit/'.$idCourse)?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                            <?php endif; ?>
                            <a href="<?=site_url('course/manage/'.$idCourse)?>" class="btn btn-warning">Voltar</a>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <form action="<?=site_url('course/wikiUpdate/'.$idCourse)?>" method="post" role="form" id="form-wiki">
              
                                <div class="form-group">
                                    <textarea class="form-control" id="wiki_text" name="wiki_text" rows="10">
                                        <?=$wiki->text?>
                                    </textarea>
                                </div>      
                                
                                <hr>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Salvar alterações</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.panel-body -->
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

    <!-- TinyMCE -->
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

</body>

</html>