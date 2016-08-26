<?php
	require_once 'init.php';
	include_once 'fornecedor.class.php';

	 // pega os dados do formulário

	 $nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	 $email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	 $data = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	 
	 // instancia objeto fornecedor
	 $fornecedor = new Fornecedores($nome, $email, $data, $file_src);

	 // insere no BD
	 $PDO = db_connect();
	 $sql ="INSERT INTO fornecedores(nomeFornecedor, email, dataFundacao) VALUES(:nome, :email, :data)";
	 $stmt = $PDO->prepare($sql);
	 $stmt->bindParam(':nome', $fornecedor->getNome());
	 $stmt->bindParam(':email', $fornecedor->getEmail());
	 $stmt->bindParam(':data', $fornecedor->getData());
	 
	 if($stmt->execute())
	 {
		header('Location: fornecedores.php');
	 }
	 else
	 {
		 echo"Erro ao cadastrar fornecedor.";
		 print_r($stmt->errorInfo());
	 }
?>
