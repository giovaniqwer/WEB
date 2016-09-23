<html>
	<head>
		<meta charset="utf-8">
		<title>Tela Cadastro</title>
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">		
	</head>
	<body>
		<div id="telacadastro">
		<h4><a href="index">Inicio</a></h4>
		<br><br>
		<div id="formulario">
			<h3>Inserir Nova Referência</h3><hr><br>
			<?php
				$atributos = array('name' => 'formulario_referencias',
								   'id'=> 'formulario_referencias');
				
				echo form_open(base_url('Principal/adicionarDados'), $atributos).
					form_label("Nome do Arquivo: ", "txt_nome").
					form_input("txt_nome").br().br().
					form_label("Título: ", "txt_titulo").
					form_input("txt_titulo").br().br().
					form_label("Autores: ", "txt_autores").
					form_input("txt_autores").br().br().
					form_label("Citações :", "txt_citacoes").
					form_input("txt_citacoes").br().br().
					form_label("Palavras-Chave :", "txt_palavraschave").
					form_input("txt_palavraschave").br().br().
					form_label("Referências: ", "txt_referencias").
					form_input("txt_referencias").br().br().
					form_submit("btn_enviar", "Enviar dados").br().
					form_close();
				
			?>
		</div></div>
	</body>
</html>
