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
        require_once("Conexao.php");?>
        
    <div class="row marketing">
        <div class="col-lg-12 mt-4">
          <form id="form">
            <input  type="text" name="campo" id="campo" class="form-control" placeholder="Buscar Nome">
          </form>
        </div>
    </div>

    <?php
       
        $sql = "select * from planos ";
        $resultadoSql = mysqli_query($conexao, $sql);
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
                    <p>Planos de ensino</p>
                </div>
                <div class="card-body" id="resultado"  >
                <table class="table">
                        <tr>
                        <th>Plano</th>
                        <th>Docente</th>
                        <th>Situação</th>
                        <th>Ação</th>
                        </tr>
                    
                        <?php foreach ($vetorTodosregistro as $umRegistro){ 
                        if($_SESSION["perfil"] == "Docente" || $_SESSION["perfil"] == "Docente do Colegiado" )   {
                            if($umRegistro["nome_docente"] == $_SESSION["nome"]){
                            ?> 
                            <tr>
                            <td>
                            <form action="ValidacaoPlano.php" method="POST"> 
                                   <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"];?>">
                                    <button type="submit" class=" btn  btn-block" ><p id="plano" class="text-left"><?= $umRegistro["nome_plano"]; ?></p></button>
                                   </form>
                            </td>
                            <td><?php echo $umRegistro["nome_docente"];?></td>
                            <td>
                            <?php if($umRegistro["situacao"] == "Novo"){ ?>
                            <h6 style="background-color:#ADD8E6;"> <?= $umRegistro["situacao"];?></h6>
                            <?php } if(($umRegistro["situacao"] == "Corrigir Colegiado")|| ($umRegistro["situacao"] == "Aprovado") || ($umRegistro["situacao"] == "Reprovado")){ ?>
                            <h6 style="background-color:#fbe531">Correção pelo colegiado</h6>
                            <?php }if($umRegistro["situacao"] == "Aguardando"){ ?>
                            <h6 style="background-color:#fc6c5a"> <?= $umRegistro["situacao"];?></h6>
                            <?php }if($umRegistro["situacao"] == "Sucesso"){ ?>
                            <h6 style="background-color:#04b826;"> <?= $umRegistro["situacao"];?></h6>
                            <?php }?>
                            
                            </td>
                            <td>
                            <?php if($umRegistro["situacao"] == "Novo" || $umRegistro["situacao"] == "Aguardando" ){ ?>    
                            <form action="PlanoCorrecao.php" method="POST">
                                        <input type="hidden" name="id_plano" value="<?=$umRegistro["id_plano"]; ?>">
                                    <button  type="submit" class="btn btn-secondary btn-sm">Submeter</button>
                            </form>
                            </td>
                            </tr>
                        
                    <?php } } } } ?>
                        
                    
                </table>
                  
                </div>
            </div>
        </div>
    </div>
    

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
                        url: "BuscarDocente.php",
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