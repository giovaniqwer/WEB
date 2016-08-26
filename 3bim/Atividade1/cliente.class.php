<?php
	class Clientes{

	private $nome;
	private $email;
	private $data;

	public function __construct($nome, $email, $data) {
	$this->setNome($nome);
	$this->setEmail($email);
	$this->setData($data);
	}

	public function getNome(){
	return $this->nome;
	}

	public function setNome($nome){
	$this->nome = $nome;
	}

	public function getData(){
	return $this->data;
	}

	public function setData($data){
	$data2 = explode('/', $data);
	$this->data = "$data2[2]-$data2[1]-$data2[0]";
	}

	public function getEmail(){
	return $this->email;
	}

	public function setEmail($email){
	$this->email = $email;
	}

}
?>
