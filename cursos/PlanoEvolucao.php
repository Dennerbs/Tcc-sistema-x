<?php 

require_once("Conexao.php");

$idplano=$_POST["idplano"];
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
	$situacao="Aguardando";
	$sql = "update planos set situacao=? where id_plano=?";
    	$sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("si",$situacao,$idplano);
        if($sqlprep -> execute()){
            	header("location: ListarPlano.php");
            }
}
?>