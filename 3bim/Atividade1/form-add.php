<?php
	require 'init.php';
?>
<div class="conteudo">
		<div class="estilo">
				<form method="post" name="formCadastro" action="add.php" enctype="multipart/form-data" onSubmit="return valida()">
						<h1>CADASTRAR CLIENTE</h1>
						<table width="100%">
							<tr>
								<th width="10%">Nome</th>
								<td width="82%"><input type="text" name="txtNome" id="nome"></td>
							</tr>
							<tr>
								<th width="10%">E-mail</th>
								<td width="82%"><input type="email" name="txtEmail" id="email"></td>
							</tr>
							<tr>
								<th>Data de Cadastro</th>
								<td><input type="text" name="txtData" class="calendarioC"  readonly></td>
							</tr>
							<tr>
								<td><input type="submit" name="btnEnviar" href="clientes.php" value="Cadastrar" onClick="chama(this)"></td>
								<td><input type="reset" name="btnLimpar" value="Limpar"></td>
							</tr>
						</table>
				</form>
		</div>
</div>
<br>
