<?php 
$idplano = $_POST['id_plano'];
var_dump($idplano);
$mes = $_POST['mes'];
$data1 = $_POST['dI'];
$data2 = $_POST['dF'];
$conteudo = $_POST['con'];



session_start();
require_once("Conexao.php");

$sql = "insert into detalhamento (id_plano,mes,dataI,dataF,conteudo) values (?,?,?,?,?)";
$sqlprep =$conexao ->prepare($sql);
$sqlprep -> bind_param("issss",$idplano, $mes,$data1,$data2,$conteudo);
$sqlprep -> execute()



 
?>