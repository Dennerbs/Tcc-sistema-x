<?php
    require_once("conexao.php");

    $id = $_POST["codigo_grupo"];
    $variavelvazia="";

    $sql = "delete from grupocorrecao where codigo_grupo = ?";
    $sqlprep = $conexao -> prepare($sql);
    $sqlprep -> bind_param("i", $id);
    if($sqlprep -> execute()){
        $sql = "update planos set codigo_grupo=? where codigo_grupo=?";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("ss",$variavelvazia,$id);
        $sqlprep -> execute(); 
    }

   require_once("ListarPlano.php");
?>