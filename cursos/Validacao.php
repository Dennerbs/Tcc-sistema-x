<?php 
    require_once("Conexao.php");
    session_start();
    $login = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "select * from usuarios where email=? and senha=?";
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
        $id = $valor["id"];
        $nome =$valor["nome"];
        $perfil =$valor["perfil"];
        $email =$valor["email"];
        $colegiado =$valor["colegiado"];
        $codgrupo = $valor["codigo_grupo"];
        

    endforeach;
    
    if(isset($validacao)){
        $_SESSION["id_logado"] = $id;
        $_SESSION["nome"]=$nome;
        $_SESSION["perfil"]=$perfil;
        $_SESSION["email"]=$email;
        $_SESSION["cole"] = $colegiado;
        $_SESSION["codigo_grupo"] = $codgrupo;
        if($perfil == "Coordenador"){
            header("location: ListarPlano.php");

        }if($perfil == "Docente"){
            header("location: ListarPlanoMeus.php");

        }if($perfil == "Pedagogo"){
            header("location: ListarPlano.php");

        }if($perfil == "Discente do Colegiado"){
            header("location: ListarPlano.php");

        }if($perfil == "Docente do Colegiado"){
            header("location: ListarPlano.php");

        }if($perfil == "Tecnico do Colegiado"){
            header("location: ListarPlano.php");

        }
    }else{    
        $_SESSION["erro"]="Erro, usuário ou senha invalidos";
        header("location: Login.php");
    }
?>