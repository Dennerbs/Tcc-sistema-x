<?php
session_start(); 
require_once("Conexao.php");


$np = $_SESSION['np'];



$sql = "select * from planos where nome_plano = '$np'";
$resultadoSql = mysqli_query($conexao, $sql);
$vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
$idplano = $vetorUmregistro['id_plano'];


?>
<?php
$mes = $_POST['mes'];
$data1 = $_POST['dI'];
$data2 = $_POST['dF'];
$conteudo = $_POST['con'];





$sql = "insert into detalhamento (id_plano,mes,dataI,dataF,conteudo) values (?,?,?,?,?)";
$sqlprep =$conexao ->prepare($sql);
$sqlprep -> bind_param("issss",$idplano, $mes,$data1,$data2,$conteudo);
$sqlprep -> execute()



 
?>