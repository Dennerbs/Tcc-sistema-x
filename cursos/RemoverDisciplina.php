<?php
    require_once("Conexao.php");

    $id = $_POST["id"];

    $sql = "delete from disciplina where id_disciplina = ?";
    $sqlprep = $conexao -> prepare($sql);
    $sqlprep -> bind_param("i", $id);
    $sqlprep -> execute();

   require_once("ListarDisciplina.php");
?>