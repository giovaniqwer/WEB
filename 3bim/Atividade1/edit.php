<?php
	require_once 'init.php';
	include_once 'cliente.class.php';

	// pega os dados do formulário
	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$nome = isset($_POST['txtNome']) ? $_POST['txtNome'] : null;
	$email = isset($_POST['txtEmail']) ? $_POST['txtEmail'] : null;
	$data = isset($_POST['txtData']) ? $_POST['txtData'] : null;
	 
	// instancia objeto Cliente
	$cliente = new Clientes($nome, $email, $data, $file_src);

	// atualiza o BD
	$PDO = db_connect();
	$sql = "UPDATE clientes SET nomeCliente = :nome, email = :email, dataCadastro = :data WHERE idCliente = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':nome', $cliente->getNome());
	$stmt->bindParam(':email', $cliente->getEmail());
	$stmt->bindParam(':data', $cliente->getData());
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);

	 if ($stmt->execute())
	 {
		header ('Location: clientes.php');
	 }
	 else
	{
		 echo "Erro ao alterar";
		 print_r( $stmt->errorInfo());
	 }
?>
