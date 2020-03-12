<?php
    require_once("ListarDisciplina.php");
    $nomeDisc = $_POST["nomeDisc"];
    $cargaH = $_POST["cargaHoraria"];
    $ementa = $_POST["ementa"];
    $nSemana = $_POST["numeroSemana"];
    $periodoC = $_POST["periodoCurso"];
    $referencias = $_POST["referencias"];
    $idCursos = $_POST["id_curso"];
    $idDisc = $_POST["idDisc"];

    require_once("Conexao.php");
    if($idDisc == 0){        
    $sql = "insert into disciplina (nome_disciplina,carga_horaria,ementa,numero_semanas,periodo_curso,referencias,id_curso) 
    values (?,?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("sisiisi",$nomeDisc, $cargaH,$ementa,$nSemana,$periodoC,$referencias,$idCursos);
    $sqlprep -> execute();
    }else{
        $sql = "update disciplina set nome_disciplina=?,carga_horaria=?,ementa=?,numero_semanas=?,periodo_curso=?,referencias=?,id_curso=? where id_disciplina=?";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("sisiisii",$nomeDisc,$cargaH,$ementa,$nSemana,$periodoC,$referencias,$idCursos,$idDisc);
        $sqlprep -> execute();
        }
    header("location: ListarDisciplina.php")   
?>