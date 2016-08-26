<!-- Trabalho feito por Bruna Tobias e Giovani Junior -->
<!DOCTYPE html>
<html lang=pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clientes e Fornecedores</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!-- Javascript -->
        <script src="assets/js/jquery-2.1.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/datepicker-pt-BR.js"></script>
        <script src="assets/js/jquery.maskedinput.js"></script>
        <script src="assets/js/ajax.js"></script>
        <script>
        $(function(){
			$("body").on("click", ".calendario", function(){
			if (!$(this).hasClass("hasDatepicker"))
			{
				$(this).datepicker({
					showButtonPanel: true,
					changeMonth: true,
					changeYear: true,
					maxDate: "today",
					minDate: new Date('01/01/2000'),
					showOn:"button",
					buttonImage:"assets/img/calendario.png",
					buttonImageOnly:true
				});
				$(this).datepicker("show");
			}	
			});
		});
        </script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        
        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Andia - a super cool design agency...</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="menutopo">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="index.html"><i class="fa fa-home"></i><br>Home</a>
							</li>
							<li>
								<a href="clientes.php"><i class="fa fa-user"></i><br>Clientes</a>
							</li>
							<li>
								<a href="fornecedores.php"><i class="fa fa-tasks"></i><br>Fornecedores</a>
							</li>
							<li>
								<a href="sobre.html"><i class="fa fa-user"></i><br>Sobre</a>
							</li>
						</ul>
				</div>
			</div>
</nav>
</body>
</html>


<!-------------------------------------------------------------------------------------------------------->
<div class="conteudo">
	<?php
		require_once 'init.php';
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM fornecedores ORDER BY nomeFornecedor ASC";
		$sql = "SELECT idFornecedor, nomeFornecedor, email, dataFundacao FROM fornecedores ORDER BY nomeFornecedor ASC";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count-> fetchColumn();
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		
	?>
	<div id="listadefornecedore">
		<h2> Lista de fornecedores </h2>
		<p>Total de fornecedores: <?php echo $total ?></p>
		<?php if($total > 0): ?>
		<table width = "85%" border="1" align="center">
			<thead>
				<tr>
					<th><center>Id do fornecedor</center></th>
					<th><center>Nome do fornecedore</center></th>
					<th><center>Email do fornecedor</center></th>
					<th><center>Data de fundação</center></th>
					<th><center>Ações</center></th>
				</tr>
			</thead>
			<tbody>
				<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					<td><?php echo $fornecedor['idFornecedor'] ?></td>
					<td><?php echo $fornecedor['nomeFornecedor'] ?></td>
					<td><?php echo $fornecedor['email'] ?></td>
					<td><?php echo $fornecedor['dataFundacao'] ?></td>
					<td><a href="form-edit2.php?id=<?php echo $fornecedor['idFundacao']?>"> Editar </a><a href="delete2.php?id=<?php echo  $fornecedor['idFornecedor'] ?>" onclick="return  confirm('Tem certeza que deseja  excluir?');"> Excluir </a></td>
				</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
		<?php else: ?>
		<p>Nenhum fornecedor registrado</p>
		<?php endif; ?>
	</div>
	<div id="adiciona">
	<button type="button" href="form-add2.php" onClick="chamaajax(this)"> Novo fornecedor </button>
	</div>
</div>
<!---------------------------------------------------------------------------------------------------------->
        <!-- Footer -->
        
      
        <footer>
            <div class="row">
                <div class="rodape">
					<p>Copyright 2016 Bruna Tobias e Giovani Junior - Todos os direitos reservados. Template by <a href="http://azmind.com">Azmind</a>.</p>
				</div>
            </div>
        </footer>
