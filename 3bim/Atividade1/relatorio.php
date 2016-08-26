<h1>RELATÓRIO DE CLIENTES</h1>
<?php
  include 'funcoes.php';
  spl_autoload_register(function ($class_name)
  {
	if(file_exists('ado/'.$class_name.'.class.php')){
		include 'ado/'.$class_name.'.class.php';
	}
	if(file_exists('html/'.$class_name.'.class.php'))
		include 'html/'.$class_name.'.class.php';
  });
  
  $html = new TElement('html');
  $html->lang = 'pt-br';
  $head = new TElement('head');
  $html->add($head); 
  $meta = new TElement('meta');
  $meta->charset = 'utf-8';
  $head->add($meta);
	
  $body = new TElement('body');
  $body->bgcolor = '#ffffff';
  $html->add($body);
  
  $conteudo = new TElement('div');
  $conteudo->class="conteudo";
  $body->add($conteudo);

  $sql = "SELECT idCliente, nomeCliente, email, dataCadastro FROM clientes";
  try
  {
    $conn = TConnection::open('config/my_config.ini');
    $result = $conn->query($sql);
    
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
	 $dados[] = array($row['idCliente'], $row['nomeCliente'], $row['email'], dateConvert($row['dataCadastro']));
    }
    $conn = null;
  } catch (Exception $e) {
    print "Erro! " . $e->getMessage() . "<br/>";
  }
  
  
  $tabela = new TTable;
  $tabela->width = 600;
  $tabela->border = 1;
  $cabecalho = $tabela->addRow();
  $cabecalho->bgcolor = '#a0a0a0';
  $cabecalho->addCell('Id');
  $cabecalho->addCell('Nome');
  $cabecalho->addCell('E-Mail');
  $cabecalho->addCell('Data');
  $j=0;
  $total = 0;
  //percorre os dados
  foreach($dados as $pessoa){
	
    // verifica qual cor utilizará para o fundo
    $bgcolor = ($j % 2) == 0 ? '#d0d0d0' : '#ffffff';
    // adiciona uma linha para os dados
    $linha = $tabela->addRow();
    $linha->bgcolor = $bgcolor;
    // adiciona as células
    $linha->addCell($pessoa[0]);
    $linha->addCell($pessoa[1]);
    $linha->addCell($pessoa[2]);
    $x = $linha->addCell($pessoa[3]);
    $x->align = 'right';
    $total += $pessoa[3];
    $j++;
  }
  
  // exibe a tabela
  //$tabela->show();
  $body->add($tabela);
  $html->show();
 
?>

