<html lang="pt-br">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <style type="text/css">
        #botaocontato{
            width:200px;
        }
    </style>
  </head>
  <body>
    <div class="container">
    <?php 
    require_once('Cabecalho.php'); 
    require_once('Conexao.php'); 
    
    $sql = "select id,nome,colegiado,codigo_grupo from usuarios";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    $vetorTodosRegistros = array();
        while($vetorUmregistro !=null){
          array_push($vetorTodosRegistros,$vetorUmregistro);
          $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);}
    
    ?>
    
    
    <div class="card mt-4">
        <div class="card-header">
            Usuarios
        </div>
        <div class="card-body">
            <ul class="list-group">
            <?php foreach($vetorTodosRegistros as $Umregistro){
              if($Umregistro["id"] != $_SESSION['id_logado']){
                  if($Umregistro["colegiado"] == "sim"){
                  if($Umregistro["codigo_grupo"] == null){
              ?>
                <li class="list-group-item">
                <div class="col-md-12">
                    <form action="SalvarGrupoCorrecao.php" method="POST">
                        <div class="form-group">   
                        <input type="checkbox" name='ids[]' value="<?=$Umregistro["id"];  ?>"  >
                        <input type="text" name='nome_usuario[]' value=" <?= $Umregistro["nome"]; ?>" readonly >
                            <?php
                        $sql = "select id,nome from imagens where id_usuario=?";
                        $sqlprep = $conexao->prepare($sql);
                        $sqlprep->bind_param("i",$Umregistro['id']);
                        $sqlprep->execute();
                        $resultadoSql = $sqlprep->get_result();
                        $registro= mysqli_fetch_assoc($resultadoSql);
                        $vetorRegistros = array();
                        while($registro !=null){
                            array_push($vetorRegistros,$registro);
                            $registro = mysqli_fetch_assoc($resultadoSql);
                        }
                        $idfoto = 0;
                        foreach($vetorRegistros as $valor):
                            $idfoto = $valor["id"];
                            $foto =$valor["nome"];                  

                        endforeach;
                        //var_dump($imagens);
                        if($idfoto != null){ ?>
                            <img src="<?php echo "./imagens/".$foto; ?>" style="width:80px; height:80px;">
                        <?php
                        }else{ ?>
                            <img src="imagens/usuario.png" style="width:80px; height:80px;">
                        <?php
                        } ?>
                            
                        </div>

                    
                </div>
                </li>
            <?php } } }
        }?>    

            </ul>

        <input type="text" name="nome_grupo" placeholder="Nome do grupo" >
        <button type="submit">Criar</button>
        </form>
        </div>
        
    </div>
    </div>
    <?php
        require_once("Footer.php");
        ?>
    </div>

    

  </body>
    <script src="https://code.jquery.com/jquery-2.2.4.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>