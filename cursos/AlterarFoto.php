<?php 

	require_once("Conexao.php");


	$id_usuario = $_POST["id_usuario"];
	$name = $_FILES["img"]["name"];
	$temp = $_FILES["img"]["tmp_name"];

	if($name !=null){
		$sql = "insert into imagens (nome,id_usuario) values ('$name','$id_usuario')";
	$conexao->query($sql);

	move_uploaded_file($temp,"./imagens/".$name);

	header("location: MeuPerfil.php");
	}else{
		header("location: MeuPerfil.php");
	}
	


 ?>