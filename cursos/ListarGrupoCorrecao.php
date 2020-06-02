<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
            <?php
            require_once("Cabecalho.php");
            require_once("Conexao.php");
              $sql = "select * from grupocorrecao ";
              $resultadoSql = mysqli_query($conexao,$sql);
                      $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
                      $vetorTodosregistro = array();
                      while($vetorUmregistro != null){
                        array_push($vetorTodosregistro, $vetorUmregistro);
                        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
                      } 
                    
            ?>

<div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                  Grupos Correção<a class="float-right text-success" href="GrupoCorrecao.php"> Criar Grupo</a>
                </div>
                <div class="card-body" id="resultado"  >
                   <table class="table">
                        <tr>
                        <th>Código Grupo</th>
                        <th >Nome Grupo</th>
                        <th >Nome Integrantes</th>
                        <th >Id Planos</th>
                        <th >Ação</th>
                        </tr>
                        <?php foreach ($vetorTodosregistro as $umRegistro){?>
                        <tr>
                          <td>#<?= $umRegistro["codigo_grupo"]?><br></td>
                          <td><?= $umRegistro["nome_grupo"]?><br></td>
                        <td><?= $umRegistro["nome_usuario"]?><br></td>
                        <td><?= $umRegistro["id_plano"]?><br></td>
                        <td>
                          <form action="DesignarPlano.php" method="POST">
                            <input type="hidden" name="codigo_grupo" value="<?=$umRegistro["codigo_grupo"];?>">
                            <button type="submit">Designar Planos</button>
                          </form>
                        </td>
                        </tr>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    


  </div>      
  </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>