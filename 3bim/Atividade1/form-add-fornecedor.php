<?php
	require 'init.php';
?>
<html>
	<head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--ARQUIVOS CSS-->
        <link href="css/style" rel="stylesheet" type="text/css">
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <!--ARQUIVOS JS-->
        <script type = "text/javascript" src = "js/jquery-2.1.1.min.js"></script>
    	<script type = "text/javascript" src = "js/jquery.maskedinput.js"></script>
        <script type = "text/javascript" src = "js/ajax.js"></script>
        <script type = "text/javascript" src = "js/jquery-ui.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type = "text/javascript" src = "js/calendario.js"></script>
		<script type = "text/javascript" src = "js/valida.js"></script>

    </head>
		<body>
<div class="conteudo">
		<div class="estilo">
				<form method="post" name="formFornecedor" action="add-fornecedor.php" enctype="multipart/form-data" onSubmit="return valida()">
						<h1>CADASTRAR FORNECEDOR</h1>
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
									<th>Data de Fundação</th>
									<td><input type="text" name="txtData" class="calendarioF" readonly></td>
								</tr>
								<tr>
									<td><input type="submit" name="btnEnviar" href="fornecedores.php" value="Cadastrar" onClick="chama(this)"></td>
									<td><input type="reset" name="btnLimpar" value="Limpar"></td>
								</tr>
						</table>
				</form>
			</div>
</div>
<br>
</body>
</html>
