<?php
session_start(); 
require_once("Conexao.php");



          
  $codgrupo = substr(uniqid(rand()), 0, 5); 
  var_dump($codgrupo);
  $nomegrupo = $_POST['nome_grupo'];
  $ids = $_POST['ids'];
  if(isset($ids)){
    $_SESSION['idsug'] = $ids;
  }

  if(!empty($ids) && count($ids) ){
    $id = implode(',', $ids);
    //var_dump($ids);
  }
  for ($i=0; $i < count($ids) ; $i++) { 
    

      $sqlprep =$conexao ->prepare($sql = "update usuarios set codigo_grupo = $codgrupo where id in ('".$ids[$i]."') ");
      $sqlprep -> execute();

      
  }
  
  for ($x=0; $x < count($ids) ; $x++) { 

    $sql = "select * from usuarios where id in ('".$ids[$x]."')";
    $resultadoSql = mysqli_query($conexao,$sql);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            $vetorTodosregistro = array();
            while($vetorUmregistro != null){
              array_push($vetorTodosregistro, $vetorUmregistro);
              $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            } 
            foreach ($vetorTodosregistro as $umRegistro){
              $nome_usuario[] = $umRegistro["nome"];
            }
          }
          if(!empty($ids) && count($ids) ){
            $nms = implode(',', $nome_usuario);
        
          }

        
    

    $sql = "insert into grupocorrecao (codigo_grupo,nome_grupo,id_usuario,nome_usuario) values (?,?,?,?)";
    $sqlprep =$conexao ->prepare($sql);
    $sqlprep -> bind_param("ssss",$codgrupo,$nomegrupo,$id,$nms);
    $sqlprep -> execute();

    
    header("location: ListarGrupoCorrecao.php");

 
    
?>