<?php

	require_once 'init.php';
	include_once 'fornecedor.class.php';

	// pega os dados do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$data = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	 
	// instancia objeto Fornecedor
	$fornecedor = new Fornecedores($nome, $email, $data, $file_src);

	// atualiza o BD
	$PDO = db_connect();
	$sql = "UPDATE fornecedores SET nomeFornecedor = :nome, email = :email, dataFundacao = :data WHERE idFornecedores = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $fornecedor->getNome());
	$stmt->bindParam(':email', $fornecedor->getEmail());
	$stmt->bindParam(':data', $fornecedor->getData());
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	 if ($stmt->execute())
	 {
		header ('Location: fornecedores.php');
	 }
	 else
	{
		 echo "Erro ao alterar";
		 print_r( $stmt->errorInfo());
	 }
?>
</html>
