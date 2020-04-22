<?php 
    require_once("Conexao.php");
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d H:i');

   
    $idl = $_POST['id'];
    var_dump($_POST['id']);
    $nomel = $_POST['nome'];
    $men = $_POST['mensagem'];
    $ids = $_POST['ids'];
    
    


    $sql = "insert into chat (id_sala,id_usuario,nome_usuario,mensagem,data) values (?,?,?,?,?)";
    $sqlprep =$conexao ->prepare($sql);
    $sqlprep -> bind_param("iisss",$ids,$idl,$nomel,$men,$data);
    $sqlprep -> execute();
?>