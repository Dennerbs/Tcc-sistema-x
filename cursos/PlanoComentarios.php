<?php 

require_once("Conexao.php");

$idplano = $_POST["idplano"];
$comentarios = $_POST["comentario"];

$situacao="Aguardando";
$sql = "update planos set situacao=?,comentario=? where id_plano=?";
            $sqlprep =$conexao ->prepare($sql);
            $sqlprep -> bind_param("ssi",$situacao,$comentarios,$idplano);
            if($sqlprep -> execute()){
            	header("location: ListarPlano.php");
            }
 ?>