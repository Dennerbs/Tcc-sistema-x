<?php
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nome = $_POST["nome"];
    $perfil = $_POST["perfil"];


    require_once("Conexao.php");
    session_start();
           
    $sql = "insert into usuarios (email,nome,senha,perfil) values (?,?,?,?)";
    $sqlprep = $conexao ->prepare($sql);
    $sqlprep -> bind_param("ssss",$email,$nome,$password,$perfil);
    if($sqlprep -> execute()){
        $_SESSION["cadastrado"]="Usuário cadastrado";
        header("location: Cadastro.php"); 

    }else{
        $_SESSION["erroCadastro"]="Erro de cadastro do usuário";
        header("location: Cadastro.php"); 
    }
    
 
?>