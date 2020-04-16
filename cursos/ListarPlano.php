<!DOCTYPE html>
<html lang="en">

<head>
    <title>Planos de Ensino</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
        p,
        h1{
            color:#4169E1;
        }
        #wp{
            color: #FFFFFF;
        }
        #sa{
            color: #01DF01;
        }

    </style>
    
</head>

<body >
    <div class="container">
        <?php  
        require_once("Cabecalho.php");
        require_once("Conexao.php");

        if($_SESSION["perfil"]=="Docente"){
        $sql = "select id_plano,nome_plano,situacao from planos where nome_docente=? ORDER BY situacao";
        $sqlprep = $conexao->prepare($sql);
        $sqlprep->bind_param("s",$_SESSION["nome"]);
        $sqlprep->execute();
        $resultadoSql = $sqlprep->get_result();
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        $vetorTodosregistro = array();
        while($vetorUmregistro != null){
            array_push($vetorTodosregistro, $vetorUmregistro);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            }
        ?>
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header">
                        <p>Meus planos de ensino</p>
                    </div>
                    <div class="card-body">
                    <div class="list-group">
                        <?php foreach ($vetorTodosregistro as $umRegistro){ 

                    if($umRegistro["situacao"]=="Novo"){
                    ?>
                        
                        <div class="row">
                        <div class="col-md-9 mt-1">
                               <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"];?>">
                                <button type="submit" class=" btn btn-primary btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button>
                               </form>
                        </div>
                        <div class="col-md-3 mt-3">
                                <form action="PlanoCorrecao.php" method="POST">
                                    <input type="hidden" name="id_plano" value="<?=$umRegistro["id_plano"]; ?>">
                                <button  type="submit" class="btn btn-secondary btn-sm">Submeter</button>
                            </form>
                            </div>
                        </div>

                        <?php }if($umRegistro["situacao"]=="CorrigirColegiado"){ ?>
                           <div class="mt-1">
                               <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"]; ?>">
                                <button  type="submit" class="btn btn-warning btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button>
                               </form>
                               
                            </div>

                        <?php }if($umRegistro["situacao"]=="Aguardando"){ ?>
                        <div class="row">
                        <div class="col-md-9 mt-1">
                               <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"];?>">
                                <button type="submit" class=" btn btn-danger btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button>
                               </form>
                        </div>
                        <div class="col-md-3 mt-3">
                                <form action="PlanoCorrecao.php" method="POST">
                                    <input type="hidden" name="id_plano" value="<?=$umRegistro["id_plano"]; ?>">
                                <button  type="submit" class="btn btn-secondary btn-sm">Submeter</button>
                            </form>
                            </div>
                        </div> 
                            
                        <?php }if($umRegistro["situacao"]=="Sucesso"){ ?>

                            <div class="mt-1">
                            <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"]; ?>">
                                <strike><button type="submit" class="btn btn-success btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button></strike>
                               </form>
                           </div>

                        <?php }
        } ?> 
                    </div>
                    </div>
                </div>
            </div>
            <?php }if(($_SESSION["perfil"]=="Pedagogo")||($_SESSION["perfil"]=="Discente do Colegiado")||($_SESSION["perfil"]=="Coordenador")){ 
        $validacao="Novo";
        $sql = "select id_plano,nome_plano,situacao from planos where situacao!=? ORDER BY situacao ";
        $sqlprep = $conexao->prepare($sql);
        $sqlprep->bind_param("s",$validacao);
        $sqlprep->execute();
        $resultadoSql = $sqlprep->get_result();
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
        $vetorTodosregistro = array();
        while($vetorUmregistro != null){
            array_push($vetorTodosregistro, $vetorUmregistro);
            $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
            }
        ?>
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header">
                        <p>Planos de Ensino dos docentes</p>
                    </div>
                    <div class="card-body">
                    <div class="list-group">
                        <?php foreach ($vetorTodosregistro as $umRegistro){ 
                    if($umRegistro["situacao"]=="CorrigirColegiado"){ ?>
                           <div class="mt-1">
                               <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"]; ?>">
                                <button  type="submit" class="btn btn-warning btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button>
                               </form>
                            </div>

                        <?php }if($umRegistro["situacao"]=="Sucesso"){ ?>

                            <div class="mt-1">
                            <form action="ValidacaoPlano.php" method="POST"> 
                               <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"]; ?>">
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $umRegistro["nome_plano"]; ?></button>
                               </form>
                           </div>

                        <?php }
                    } ?> 
                    </div>
                    </div>
                </div>
            </div>
        <?php } ?>
       
        <div class="col-md-5 mt-4">
            <p class="text-center">Clique no botão abaixo, para visualizar o que significa cada uma das cores do plano de ensino</p>
            <button type="button" class="btn btn-outline-dark btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">
            Legenda Status dos Planos
            </button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg bg-light">
                <div class="modal-header align">
                        <h5 class="modal-title text-primary" >Legendas</h5>         
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <div class="bg bg-light modal-body">
            <div class="row">
                <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-lg btn-block" data-container="body" data-toggle="popover" data-placement="top" 
                    data-content="Seu plano de ensino acaba de ser criado, e 
                    ainda não foi enviado para receber sugestões ou a aprovação do colegiado.">Novo
                </button></div>
                <div class="col-md-6 ">
                <button type="button" class="btn btn-success text-white btn-lg btn-block" data-container="body" data-toggle="popover" data-placement="right" 
                    data-content="Seu plano de ensino passou pelas mãos do colegiado e foi considerado suficiente.">Aprovado
                </button></div>
                <div class="col-md-6 mt-1">
                <button type="button" class="btn btn-warning btn-lg btn-block" data-container="body" data-toggle="popover" data-placement="right" 
                    data-content="O plano de ensino foi direcionado e aguarda as sugestões do colegiado.">Aguardando Sugestões
                </button></div>
                <div class="col-md-6 mt-1">
                <button type="button" class="btn btn-danger btn-lg btn-block" data-container="body" data-toggle="popover" data-placement="bottom" 
                    data-content="O colegiado recebeu seu plano de ensino e retornou-o, 
                    para que você possa fazer algumas alterações em certos pontos,e então enviá-lo novamente">Aguardando suas correções
                </button></div>
                
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div></div>

    </div>
  </div>
    <div>
    <?php require_once("Footer.php");?>
    </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
            $(function () {
            $('[data-toggle="popover"]').popover()
            })
    </script>
</body>

</html>