<?php
    require_once("conexao.php");

    $id = $_POST["reprovado"];
    $reprovado = "Reprovado";
        $sql = "update planos set situacao=? where id_plano=?";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("si",$reprovado,$id);
        $sqlprep -> execute(); 
    

   require_once("ListarPlano.php");
?>