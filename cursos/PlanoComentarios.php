<?php 

require_once("Conexao.php");
session_start();

$idplano = $_POST["idplano"];
$usuario = $_SESSION["nome"];
$perfil = $_SESSION["perfil"];
$comentario = $_POST["comentario"];
date_default_timezone_set('America/Sao_Paulo');
$data = date('Y-m-d H:i');
	$sql = "insert into comentarios (usuario,perfil,comentario,horario,id_plano) values (?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("ssssi",$usuario,$perfil,$comentario,$data,$idplano);
    if($sqlprep -> execute()){
    	header("location: PlanoColegiado.php");
    }
 ?>