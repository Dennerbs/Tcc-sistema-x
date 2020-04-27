<?php
    require_once("Conexao.php");
    $id = $_POST["idusuario"];
    $perfil = $_POST["perfil"];
    $email = $_POST["email"];
    $novasenha = $_POST["senhanova"];
    $antigasenha = $_POST["senhaantiga"];
    $nome = $_POST["nome"];

    $sql = "select * from usuarios where id=?";
            $sqlprep = $conexao->prepare($sql);
            $sqlprep->bind_param("i",$id);
            $sqlprep->execute();
            $resultadoSql = $sqlprep->get_result();
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            $vetorTodosregistro = array();
            while($vetorUmregistro != null){
                array_push($vetorTodosregistro, $vetorUmregistro);
                $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            }
            foreach($vetorTodosregistro as $registro){
                  $validacao = $registro['senha'];

            }
    if($antigasenha == $validacao){
            $sql = "update usuarios set email=?,nome=?,senha=?,perfil=? where id=?";
            $sqlprep =$conexao ->prepare($sql);
            $sqlprep -> bind_param("ssssi",$email,$nome,$novasenha,$perfil,$id);
            if($sqlprep -> execute()){
                $_SESSION["alterado"]= "Seus dados foram alterados";
                header("location: MataSessao.php"); 
            }else{
                $_SESSION["nalterado"]="Seus dados n foram alterados";
                header("location: Atualizar.php"); 
            } 
    }else{
        $_SESSION["nalterado"]= "Senha invalida";
        header("location: Atualizar.php"); 
    }  
    
    
 
?>