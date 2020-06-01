<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $perfil = $_POST["perfil"];

    if($perfil == "Docente"){
        $colegiado = "nao";
    }else{
        $colegiado = "sim";
    }
    
    require_once("Conexao.php");
    session_start();
           
    $sql = "insert into usuarios (email,nome,senha,perfil,colegiado) values (?,?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("sssss",$email,$nome,$password,$perfil,$colegiado);
    if($sqlprep -> execute()){
        $_SESSION["cadastrado"]="Usuário cadastrado";
        header("location: FormCadastro.php"); 

    }else{
        $_SESSION["erroCadastro"]="Erro de cadastro do usuário";
        header("location: FormCadastro.php"); 
    }
    
 
?>