<?php
	require'init.php';
	// pega o ID da URL
	$id = isset($_GET ['id']) ? (int) $_GET['id'] : null;
	// valida o ID
	if(empty($id))
	{
		echo "ID para alteração não definido";
		exit;
	}
	// busca os dados do usuário a ser editado
	$PDO = db_connect();
	$sql = "SELECT nomeCliente, email, dataCadastro FROM clientes WHERE idCliente = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
	/* se o método fetch()não retornar um array
	significa que o ID não corresponde a um usuário válido */
	if(!is_array($cliente))
	{
		echo "Nenhum cliente encontrado.";
		exit;
	}
	$dataOK = dateConvert($cliente['dataCadastro']);
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
        <div class="navbar navbar-default" id="topo">
            <div class="container text-center">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img height="20" alt="Brand" src="img/logo.png" class="img-rounded" id="logo"></a>
                </div>
                <div id="menuTopo">
					<div class="collapse navbar-collapse" id="navbar-ex-collapse">
						<center>
							<strong>
								<ul class="nav navbar-center navbar-nav">
									<li>
										<a href="index.html">HOME</a>
									</li>
									<li>
										<a href="clientes.php">CLIENTES</a>
									</li>
									<li>
										<a href="fornecedores.php">FORNECEDORES</a>
									</li>
									<li>
										<a href="sobre.html">SOBRE</a>
									</li>
								</ul>
							</strong>
						</center>
					</div>
				</div>
			</div>
		</div>
           <div class="conteudo">
		<div class="estilo">
				<form method="post" name="formAltera" action="edit.php" enctype="multipart/form-data" onSubmit="return valida()">
						<h1>EDITAR CLIENTE</h1>
						<table width="100%">
								<tr>
									<th width="10%">Nome</th>
									<td width="82%"><input type="text" name="txtNome" id="nome" value="<?php echo $cliente['nomeCliente']?>"></td>
								</tr>
								<tr>
									<th width="10%">E-mail</th>
									<td width="82%"><input type="email" name="txtEmail" id="email" value="<?php echo $cliente['email']?>"></td>
								</tr>
								<tr>
									<th>Data de Cadastro</th>
									<td><input type="text" name="txtData" id="dataF" value="<?php echo $dataOK ?>" class="calendarioC" readonly></td>
								</tr>
								<tr>
									<input type="hidden" name="id" value="<?php echo $id ?>">
									<td><input type="submit" href="clientes.php" name="btnEnviar" value="Cadastrar" onClick="chama(this)"></td>
									<td><input type="reset" name="btnLimpar" value="Limpar" onClick="chama(this)"></td>
								</tr>
						</table>
				</form>
		</div>
	</div>
<br>
            <footer class="section">
                <div class="row" id="rodape">
                    <div class="col-sm-6 text-justify">
                        <h1>Stonewall</h1>
                        <p>© 2016 Rafaela Custódio e Yagho Baldansi || Todos os direitos reservados.</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-right text-success">
                            <br>
                            <br>
                        </p>
                        <div class="row">
                            <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </footer>
        
    
    </body></html>

