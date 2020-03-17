<?php
    require_once("conexao.php");

    $id = $_POST["id_curso"];

    $sql = "delete from curso where id_curso = ?";
    $sqlprep = $conexao -> prepare($sql);
    $sqlprep -> bind_param("i", $id);
    $sqlprep -> execute();

   require_once("ListarCurso.php");
?>