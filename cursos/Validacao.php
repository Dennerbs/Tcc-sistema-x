<?php 
    require_once("Conexao.php");
    session_start();
    $login = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "select nome,perfil from usuarios where email=? and senha=?";
    $sqlprep = $conexao->prepare($sql);
    $sqlprep->bind_param("ss",$login,$password);
    $sqlprep->execute();
    $resultadoSql = $sqlprep->get_result();
    $registro= mysqli_fetch_assoc($resultadoSql);
    $vetorRegistros = array();
    while($registro !=null){
        array_push($vetorRegistros,$registro);
        $registro = mysqli_fetch_assoc($resultadoSql);
        $validacao = 0;
    }
    foreach($vetorRegistros as $valor):
        $nome =$valor["nome"];
        $perfil =$valor["perfil"];

    endforeach;
    
    if(isset($validacao)){
        $_SESSION["nome"]=$nome;
        $_SESSION["perfil"]=$perfil;
        header("location: FormDisc.php");

    }else{    
        $_SESSION["erro"]="Erro, usuário ou senha invalidos";
        header("location: Login.php");
    }
?>