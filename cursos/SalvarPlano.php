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
    $id_plano = $_POST["id_plano"];

    require_once("Conexao.php");
    session_start();
    
    if($id_plano==0){
    $situacao ="Novo";
    $comentarios="";
    $sql = "insert into planos (nome_plano,nome_docente,curso_plano,periodoC_plano,nomeDisc_plano,carga_plano,semanas_plano,
        aulasT_plano,aulasP_plano,aulasL_plano,laboratorio,ementa_plano,objetivosG_plano,objetivosE_plano,aprendizagem,
        referencias_plano,complementares,p1_primeiro,p2_primeiro,p1_segundo,p2_segundo,situacao)
        values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("sssisiiiiissssssssssss",$nomePlano,$nomeDocente,$nomeCurso,$periodoC,$nomeDisc,$cargaDisc,$semanaDisc,
        $aulasT,$aulasP,$aulasL,$laboratorio,$ementaDisc,$objetivosG,$objetivosE,$avaliacaoA,$referenciasB,$referenciasC,$p1primeiro,$p2primeiro,$p1segundo,$p2segundo,$situacao);
    if($sqlprep -> execute()){
        $_SESSION["inseridoPlano"]="Plano de ensino foi adicionado com sucesso";
        $_SESSION['np'] = $nomePlano; 
        
        header("location: FormPlano_det.php"); 

    }else{
        $_SESSION["erroPlano"]="Erro ao adicionar plano de ensino";
        header("location: FormPlano.php"); 
    }
}else{
        $sql = "update planos set nome_plano=?,nome_docente=?,curso_plano=?,periodoC_plano=?,nomeDisc_plano=?,carga_plano=?,semanas_plano=?,
        aulasT_plano=?,aulasP_plano=?,aulasL_plano=?,laboratorio=?,ementa_plano=?,objetivosG_plano=?,objetivosE_plano=?,aprendizagem=?,referencias_plano=?,complementares=?,p1_primeiro=?,p2_primeiro=?,p1_segundo=?,p2_segundo=? where id_plano=?";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("sssisiiiiiissssssssssi",$nomePlano,$nomeDocente,$nomeCurso,$periodoC,$nomeDisc,$cargaDisc,$semanaDisc,$aulasT,$aulasP,$aulasL,$laboratorio,$ementaDisc,$objetivosG,$objetivosE,$avaliacaoA,$referenciasB,$referenciasC,$p1primeiro,$p2primeiro,$p1segundo,$p2segundo,$id_plano);
        if($sqlprep->execute()){
         $_SESSION["alteracao"]="Plano alterado com sucesso";
        header("location: ListarPlano.php");  
        }else{
        $_SESSION["erroAlterac"]="Não foi possível alterar o plano de ensino";
        header("location: ListarPlano.php");   

        }
}

    
 
?>
<form action="SalvarPlano_det.php" method="POST">
             <input name="idp" value="<?php $id_plano ?>">
        </form>  