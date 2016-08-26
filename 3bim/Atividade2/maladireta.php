<?php
	//PDF
	require('fpdf/fpdf.php');
	$pdf = new FPDF('P', 'pt', 'A4');
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('d/m/y');
	
	//BD
	require_once 'init.php';
	$PDO = db_connect();
	$sql_count = "SELECT COUNT(*) AS total FROM clientes ORDER BY nomeCliente ASC";
	$sql = "SELECT nomeCliente FROM clientes ORDER BY nomeCliente ASC";
	$stmt_count = $PDO->prepare($sql_count);
	$stmt_count->execute();
	$total = $stmt_count-> fetchColumn();
	$stmt = $PDO->prepare($sql);
	$stmt->execute();

	$pdf->SetTitle('TRABALHO PDF');
	$pdf->SetAuthor('Giovani Junior e Bruna Tobias');
	$pdf->SetCreator('php'.phpVersion());
	$pdf->SetKeywords('php', 'pdf');
	$pdf->SetSubject('Fazendo trabalho');
	
	while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)):
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 12);
	//Espaçamento Vertical
	$pdf->Ln(20);
	$pdf->SetY(70);
	$pdf->SetX(380);
	$cid = "Varginha, " . $date;
	$pdf->Write(30, $cid);
	$pdf->Ln(40);
	$parte1 = "Prezado(a) Sr(a) " . $cliente['nomeCliente'] . ",";
	$parte1 = utf8_decode($parte1);
	$pdf->Write(30, $parte1);
	$pdf->Ln(60);
	$pdf->SetX(80);
	$parte2 = "Neste mês de aniversário nossa loja está com promoções imperdíveis e selecionadas especialmente para você.";
	$parte2 = utf8_decode($parte2);
	$parte3 = "Não perca esta oportunidade de realizar bons negócios.";
	$parte3 = utf8_decode($parte3);
	$parte4 = "Faça-nos uma visita.";
	$parte4 = utf8_decode($parte4);
	$pdf->Write(20, $parte2);
	$pdf->Ln(20);
	$pdf->SetX(80);
	$pdf->Write(20, $parte3);
	$pdf->Ln(20);
	$pdf->SetX(80);
	$pdf->Write(20, $parte4);
	$pdf->Ln(80);
	$parte5 = "Cordialmente,";
	$parte5 = utf8_decode($parte5);
	$pdf->Write(20, $parte5);
	
	$nome = "Giovani";
	$final = "Gerente comercial";
	$pdf->Ln(80);
	$pdf->SetX(270);
	$pdf->Write(20, $nome);
	$pdf->Ln(15);
	$pdf->SetX(240);
	$pdf->Write(20, $final);
	endwhile;
	
	
	$pdf->Output();
	
?>
