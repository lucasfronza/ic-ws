        <div class="row">
			<div class="col-md-offset-4 col-md-3">
			
			<div class="panel panel-default">
			  <div class="panel-heading">
				MINHA CONTA
                  <div>
                    <a href="<?=site_url('profile/edit')?>" class="btn btn-default" >Alterar dados</a>
                  </div>
			  </div>
			  <div class="panel-body">
				
				<table class="table table-hover">
						<tr>
							<th style="text-align:right;"> Nome </th>
							<td> <?php echo $user->name; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Sobrenome </th>
							<td> <?php echo $user->surname; ?> </td>
						</tr>
						<tr>
							<th style="text-align:right;"> E-mail </th>
							<td> <?php echo $user->email; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Celular </th>
							<td> <?php echo $user->phone; ?> </td>
						</tr>
                        <tr>
							<th style="text-align:right;"> Endereço </th>
							<td> <?php echo $user->address; ?> </td>
						</tr>
						<tr>
							<th style="text-align:right;"> Cidade </th>
							<td> <?php echo $user->city; ?> </td>
						</tr>
						<tr>
							<th style="text-align:right;"> Estado </th>
							<td> <?php echo $user->state; ?> </td>
						</tr>
						<tr>
							<th style="text-align:right;"> Tipo </th>
							<td> <?=ucfirst($user->type) ?> </td>
						</tr>
				</table>
	
				
			  </div>
			</div>
			
		  </div>
		</div>
			
		<script src="<?=base_url('static/resources/jquery.min.js')?>"></script>
	    <script src="<?=base_url('static/resources/bootstrap.min.js')?>"></script>
	</body>
</html>