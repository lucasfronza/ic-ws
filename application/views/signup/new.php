<h2>Cadastro</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('signup/new_user') ?>

	<label for="name">Nome</label>
	<input type="text" name="name" /><br />
    
    <label for="surname">Sobrenome</label>
	<input type="text" name="surname" /><br />

    <label for="username">Nome de usuário</label>
	<input type="text" name="username" /><br />

    <label for="password">Senha</label>
	<input type="text" name="password" /><br />

    <label for="email">Email</label>
	<input type="email" name="email" /><br />

    <label for="phone">Celular</label>
	<input type="text" name="phone" /><br />

    <label for="address">Endereço</label>
	<input type="text" name="address" /><br />

	<label for="city">Cidade</label>
	<input type="text" name="city" /><br />

    <label for="state">Estado</label>
	<input type="text" name="state" /><br />

	<input type="submit" name="submit" value="Cadastrar" />

</form>
