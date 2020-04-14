<?php 

require_once("Conexao.php");

$idplano=$_POST["idplano"];
$comentarios = $_POST["comentario"];
$finalizado=$_POST["finalizado"];

if($finalizado=="finalizado"){
	$situacao="Sucesso";
	$sql = "update planos set situacao=? where id_plano=?";
    	$sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("si",$situacao,$idplano);
        if($sqlprep -> execute()){
            	header("location: ListarPlano.php");
            }

}else{
	$situacao="CorrigirCoordenador";
	$sql = "update planos set situacao=?,comentario=? where id_plano=?";
    	$sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("ssi",$situacao,$comentarios,$idplano);
        if($sqlprep -> execute()){
            	header("location: ListarPlano.php");
            }
}
?>