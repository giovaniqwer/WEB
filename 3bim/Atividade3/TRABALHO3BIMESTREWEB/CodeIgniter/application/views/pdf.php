<?php
		//INCUINDO O ARQUIVO FPDF
		include(BASEPATH."libraries/fpdf/fpdf.php");
		//GERANDO PDF
		$pdf = new FPDF("P", "pt", "A4");
		$pdf->AddPage();
		$pdf->SetFont('arial');
		$texto = utf8_decode("Relação das Referêcias Bibiográficas");
		$pdf->Cell(0,5, $texto, 0, 1, "C");
		foreach($citacoes as $parte){
			$pdf->Ln(16);
			$texto = utf8_decode("Nome do arquivo: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->nomeArquivo), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Titulo: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->titulo), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Autores: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->autores), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Citações: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->citacoes), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Referências: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->referencias), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Palavras-chave: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->palavrasChave), 0, 1, "L");
			$pdf->Ln(10);
			$texto = utf8_decode("Data de cadastro: ");
			$pdf->Cell(0,5, $texto.utf8_decode($parte->dataCadastro), 0, 1, "L");
			$pdf->Ln(10);
			$texto = "----------------------------------------------------------------------------------------------------------------";
			$pdf->Cell(0,5, $texto, 0, 1, "C");
		}
		$pdf->Output();
?>
