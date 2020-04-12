<?php
    $nomePlano = $_POST["nomePlano"];
    $nomeDocente = $_POST["nomeDocente"];
    $nomeCurso = $_POST["nomeCurso"];
    $periodoC = $_POST["periodoC"];
    $nomeDisc = $_POST["nomeDisc"];
    $cargaDisc = $_POST["cargaDisc"];
    $semanaDisc = $_POST["semanaDisc"];
    $aulasT = $_POST["aulasT"];
    $aulasP = $_POST["aulasP"];
    $aulasL = $_POST["aulasL"];
    $laboratorio = $_POST["laboratorio"];
    $ementaDisc = $_POST["ementaDisc"];
    $objetivosG = $_POST["objetivosG"];
    $objetivosE = $_POST["objetivosE"];
    $avaliacaoA = $_POST["avaliacaoA"];
    $referenciasB = $_POST["referenciasB"];
    $referenciasC = $_POST["referenciasC"];
    $p1primeiro = $_POST["p1primeiro"];
    $p2primeiro = $_POST["p2primeiro"];
    $p1segundo = $_POST["p1segundo"];
    $p2segundo = $_POST["p2segundo"];


    require_once("Conexao.php");
    session_start();
           
    $situacao ="Novo";
    $sql = "insert into planos (nome_plano,nome_docente,curso_plano,periodoC_plano,nomeDisc_plano,carga_plano,semanas_plano,
        aulasT_plano,aulasP_plano,aulasL_plano,laboratorio,ementa_plano,objetivosG_plano,objetivosE_plano,aprendizagem,
        referencias_plano,complementares,p1_primeiro,p2_primeiro,p1_segundo,p2_segundo,situacao)
        values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("sssisiiiiissssssssssss",$nomePlano,$nomeDocente,$nomeCurso,$periodoC,$nomeDisc,$cargaDisc,$semanaDisc,
        $aulasT,$aulasP,$aulasL,$laboratorio,$ementaDisc,$objetivosG,$objetivosE,$avaliacaoA,$referenciasB,$referenciasC,$p1primeiro,$p2primeiro,$p1segundo,$p2segundo,$situacao);
    if($sqlprep -> execute()){
        $_SESSION["inseridoPlano"]="Plano de ensino foi adicionado com sucesso";
        header("location: FormPlano.php"); 

    }else{
        $_SESSION["erroPlano"]="Erro ao adicionar plano de ensino";
        header("location: FormPlano.php"); 
    }
    
 
?>