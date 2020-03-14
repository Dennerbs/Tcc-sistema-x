<?php
<<<<<<< HEAD
=======

>>>>>>> 3f4a350703ed10426f1fe604afe2ff4e8b3e1522
    session_start();
    require_once("Conexao.php");
    $idDisc = $_POST["idDisc"];

    $sql = "select nome_disciplina from disciplina where id_disciplina=?";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("i",$idDisc);
    $sqlprep->execute();
    $resultadoSql = $sqlprep->get_result();
    $registro= mysqli_fetch_assoc($resultadoSql);
    $vetorRegistros = array();
    while($registro !=null){
        array_push($vetorRegistros,$registro);
        $registro = mysqli_fetch_assoc($resultadoSql);
    }
    foreach($vetorRegistros as $valor):
        $nome =$valor["nome_disciplina"];
    endforeach;

    $_SESSION["nomeDisc"] = $nome;
    header("location: FormPlano.php");

?>