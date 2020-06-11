
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
    
    $sql = "select * from usuarios ORDER BY nome ASC";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    $vetorTodosRegistros = array();
        while($vetorUmregistro !=null){
          array_push($vetorTodosRegistros,$vetorUmregistro);
          $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);}
    
    ?>
    
    <div class="row marketing">
        <div class="col-lg-12 mt-2">
          <form id="form">
            <input  type="text" name="campo" id="campo" class="form-control" placeholder="Buscar por Membro" >
          </form>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Membros
            <a class="float-right text-success" href="FormCadastro.php"> Cadastrar Usuário</a>
        </div>
        <div class="card-body" id="resultado">
            <ul class="list-group">
            <?php foreach($vetorTodosRegistros as $Umregistro){
              if($Umregistro["id"] != $_SESSION['id_logado']){
              ?>
                <li class="list-group-item">
                <div class="col-md-12">
                    <form action="chat.php" method="POST">
                        <input type="hidden" name="id" value="<?=$Umregistro["id"]; ?>">
                        <input type="hidden" name="nome" value="<?=$Umregistro["nome"]; ?>">
                        <div class="form-group">  
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
                            <button id="botaocontato" type="submit" class="btn btn-outline-primary ml-3"><?=$Umregistro["nome"]; ?></button> 
                        </div>

                    </form>
                </div>
                </li>
            <?php }
        }?>    

            </ul>
        </div>
        
    </div>
    </div>
    <?php
        require_once("Footer.php");
        ?>
    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="javascript.js">
    </script>
    <script>
            $(function () {
            $('[data-toggle="popover"]').popover()
            })
    </script>
    <script>
            $(document).ready(function() {
            $('#campo').keyup(function() {
                $('#form').submit(function(){
                    var dados = $(this).serialize();
                    $.ajax({
                        url: "BuscarMembros.php",
                        type:"POST",
                        dataType:'html',
                        data: dados,
                        success:function(data){
                            $('#resultado').empty().html(data);
                        }


                    })

                return false;
                });
                $('#form').trigger('submit'); 
            }); 
        });
    </script>

</html>