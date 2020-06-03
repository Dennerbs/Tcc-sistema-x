<?php
    require_once("conexao.php");

    $id = $_POST["aprovado"];
    $aprovado = "Aprovado";
        $sql = "update planos set situacao=? where id_plano=?";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("si",$aprovado,$id);
        $sqlprep -> execute(); 
    

   require_once("ListarPlano.php");
?>