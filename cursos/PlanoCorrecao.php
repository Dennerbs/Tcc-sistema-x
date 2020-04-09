<?php

require_once("Conexao.php");
$id = $_POST["id_plano"];
$Corrigir="Corrigir";
$sql = "update planos set situacao=? where id_plano=?";
            $sqlprep =$conexao ->prepare($sql);
            $sqlprep -> bind_param("si",$Corrigir,$id);
            if($sqlprep -> execute()){
	            $_SESSION["submetido"] = "Plano foi submetido com sucesso, aguarde correções";
	            require_once("ListarPlano.php");
            }else{
	            $_SESSION["erros"] = "Não foi possivel submeter o plano X_X";
	            require_once("ListarPlano.php");
            }


 ?>