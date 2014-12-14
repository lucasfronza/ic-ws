
		
		<div class="row">
			<div class="col-md-offset-3 col-md-6">
                
            <div class="panel panel-default">
			  <div class="panel-heading">
				QUADRO DE PRESENÇA
			  </div>
			  <div class="panel-body">
                
                    <?php if (empty($board)): ?>
                        <p style="text-align:center;">Quadro de presença vazio.</p>
                    <?php else: ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th> USUÁRIO </th>
                                    <th> PRESENÇAS </th>
                                    <th> FALTAS </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($board as $item): ?>
                                <tr>
                                    <td><?=$item->user?></td>
                                    <td><?=$item->attendance?></td>
                                    <td><?=$item->absence?></td>
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