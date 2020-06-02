<?php 
require_once("Conexao.php");
$idplano = $_POST["id_plano"];
$codgrupo = $_POST["cod_grupo"];
var_dump($idplano = $_POST["id_plano"]);


for ($i=0; $i < count($idplano) ; $i++) { 
    $sqlprep =$conexao ->prepare($sql = "update planos set codigo_grupo = $codgrupo where id_plano in ('".$idplano[$i]."') ");
    $sqlprep -> execute();

}

if(!empty($idplano) && count($idplano) ){
    $idp = implode(',', $idplano);
    var_dump($idp);

  }
for ($x=0; $x < count($idplano) ; $x++) { 
    $sqlprep =$conexao ->prepare($sql = "update grupocorrecao set 
    id_plano = '".$idp."' where codigo_grupo in ('".$codgrupo."') ");
    $sqlprep -> execute();
}
header("location: ListarGrupoCorrecao.php");
?>