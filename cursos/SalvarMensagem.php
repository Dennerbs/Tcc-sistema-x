	<?php 
	require_once("Conexao.php");

	$listagem = array();
	$mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : null;
	$usuario = isset($_POST["usuario"]) ? $_POST["usuario"]: null;

	if(!empty($mensagem) && !empty($usuario)){
		$sql = "insert into chat ('mensagem','remetente') values ('.$mensagem','.$usuario')";
		$listagem["mostrar"] = $conexao ->query($sql);
	}

	$start = isset($_GET["start"]) ? intval($_GET["start"]) : 0;
	$mensagens = $conexao->query("select * from chat where id > $start");
	while($linha = $mensagens->fetch_assoc()){
		$listagem["mensagens"][] = $linha;

	}

	header('Access-Control-Allow-Origins: *');
	header('Content-Type: application/json');


	echo json_encode($listagem);
	?>