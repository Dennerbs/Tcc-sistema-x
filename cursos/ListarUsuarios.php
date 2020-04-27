
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
    
    $sql = "select * from usuarios";
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
              ?>
                <li class="list-group-item">
                <div class="col-md-12">
                    <form action="chat.php" method="POST">
                        <input type="hidden" name="id" value="<?=$Umregistro["id"]; ?>">
                        <input type="hidden" name="nome" value="<?=$Umregistro["nome"]; ?>">
                        <div class="form-group">  
                            <img src="imagens/usuario.png" alt="imagem do usuario" class="img-thumbnail">
                            <button id="botaocontato" type="submit" class="btn btn-outline-primary ml-3"><?=$Umregistro["nome"]; ?></button> 
                        </div>

                    </form>
                </div>
                </li>
            <?php }}?>    

            </ul>
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