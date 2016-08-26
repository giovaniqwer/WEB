<?php
	require_once 'init.php';
	$PDO = db_connect();
	$sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
	$sql = "SELECT idFornecedores, nomeFornecedor, email, dataFundacao FROM fornecedores ORDER BY nomeFornecedor ASC";
	$stmt_count = $PDO->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count->fetchColumn();
	$stmt = $PDO->prepare($sql);
	$stmt->execute();
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
			<h1>CADASTRO DE FORNECEDORES</h1>
			<p> <input type="button" href="form-add-fornecedor.php" name="novo" value="Novo"  onClick="chama(this)"></p>
			<p> <input type="button" href="relatorio-fornecedores.php" name="relatorio-f" value="Relatorio"  onClick="chama(this)"></p>
			<?php if($total>0): ?>
			<table width="100%" border="1">
						<thead>
							<tr>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Data Fundação</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
								<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
											<tr>
												<td><?php echo $fornecedor ['nomeFornecedor'] ?></td>
												<td><?php echo $fornecedor ['email'] ?></td>
												<td><?php echo dateConvert( $fornecedor ['dataFundacao']) ?></td>
												<td>
													<a href="form-edit-fornecedor.php?id=<?php echo $fornecedor ['idFornecedores']?>"  onClick="chama(this)"> Editar</a>
													<a href="delete-fornecedor.php?id=<?php echo $fornecedor ['idFornecedores']?>" onclick="return confirm('Deseja realmente excluir esse fornecedor?') ;"> Excluir</a>
												</td>
											</tr>
								<?php endwhile; ?>
						</tbody>
			</table>
			<?php else: ?>
				<p> Nenhum fornecedor cadastrado.</p>
			<?php endif; ?>
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
              <p class="text-right text-success"> <br><br></p>
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
        </div>
    </footer>



</body></html>
        
    
