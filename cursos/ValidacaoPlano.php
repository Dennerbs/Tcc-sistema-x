<?php 

	require_once("Conexao.php");
	session_start();

	$idplano = 0;

    if(isset($_POST['id_plan'])){
      $idplano = $_POST['id_plan'];
    }
    $sql = "select situacao from planos where id_plano = $idplano";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);

    if($vetorUmregistro["situacao"]=="Novo"){
    	$_SESSION["id_plan"]=$idplano;
    	header("location: PlanoNovo.php");
    }if($vetorUmregistro["situacao"]=="CorrigirColegiado"){
    	$_SESSION["id_plan"]=$idplano;
    	header("location: PlanoColegiado.php");
    }if($vetorUmregistro["situacao"]=="CorrigirCoordenador"){
    	$_SESSION["id_plan"]=$idplano;
    	header("location: PlanoCoordenador.php");
    }
    if($vetorUmregistro["situacao"]=="Aguardando"){
    	$_SESSION["id_plan"]=$idplano;
    	header("location: PlanoAguardando.php");
    }
    if($vetorUmregistro["situacao"]=="Sucesso"){
    	$_SESSION["id_plan"]=$idplano;
    	header("location: PlanoAprovado.php");
    }

 ?>