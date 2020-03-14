<?php
    $nomePlano = $_POST["nomePlano"];
    $nomeDisc = $_POST["nomeDisc"];
    $cargaDisc = $_POST["cargaDisc"];
    $semanaDisc = $_POST["semanaDisc"];
    $ementaDisc = $_POST["ementaDisc"];
    $objetivos = $_POST["objetivosDisc"];


    require_once("Conexao.php");
    session_start();
           
    $sql = "insert into planos (nome_plano,disc_plano,carga_plano,semanas_plano,ementa_plano,objetivos_plano) values (?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("ssiiss",$nomePlano,$nomeDisc,$cargaDisc,$semanaDisc,$ementaDisc,$objetivos);
    if($sqlprep -> execute()){
        $_SESSION["inseridoPlano"]="Plano de ensino foi adicionado com sucesso";
        header("location: FormPlano.php"); 

    }else{
        $_SESSION["erroPlano"]="Erro ao adicionar plano de ensino";
        header("location: FormPlano.php"); 
    }
    
 
?>