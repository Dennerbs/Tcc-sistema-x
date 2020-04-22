<?php
require_once('Conexao.php');
session_start();
$id_sala = 0;

    if(isset($_SESSION['ids'])){
        $id_sala = $_SESSION['ids'];

    }
    


        $sql = "select * from chat where id_sala = $id_sala";
        $resultadoSql = mysqli_query($conexao, $sql);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        $vetorTodosRegistros = array();
        while($vetorUmregistro !=null){
          array_push($vetorTodosRegistros,$vetorUmregistro);
          $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);}
        foreach($vetorTodosRegistros as $Umregistro){ ?> 
            <div class="row">
                <div class="col-9"><span class="text-success"><?= $Umregistro['nome_usuario'];?>:</span></div>
                <div class="col-6"><span><h6><?= $Umregistro['mensagem'];?></h6></span></div>
                <div class="col-4"><span class="float-right text-primary"><small><?= $Umregistro['data'];?></small> </span></div>
            </div><br>
          
                
            
        <?php }  



?>