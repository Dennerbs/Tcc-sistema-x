<?php
session_start(); 
require_once("Conexao.php");


$np = $_SESSION['np'];



$sql = "select * from planos where nome_plano = '$np'";
$resultadoSql = mysqli_query($conexao, $sql);
$vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
$idplano = $vetorUmregistro['id_plano'];


?>
<?php
    

    
    
    $mes = $_POST['mes'];
    $conteudo = $_POST['con'];
    for ($i=0 ; $i < sizeof($mes) ; $i++) { 
       
        $sqlprep =$conexao ->prepare($sql = "insert into detalhamento (id_plano,mes,conteudo) values ('".$idplano."','".$mes[$i]."','".$conteudo[$i]."')");

        $sqlprep -> execute();
      }
      header("location: ListarPlano.php"); 
?>