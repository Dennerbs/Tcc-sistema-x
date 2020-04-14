<!doctype html>
<html lang="pt-br">
  <head>
  <title>Plano de Ensino</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <?php 
    require_once("Cabecalho.php");
    require_once("Conexao.php");
    $idplano = 0;

    
    if(isset($_POST['id_plan'])){
      $idplano = $_POST['id_plan'];
    }
  
  
    $sql = "select * from planos where id_plano = $idplano";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);

    if($vetorUmregistro["situacao"]=="Aprovado"){
?>
  <div class="col-md-12 mt-4">
    <div class="card" style="background-color: #212529;">
      <div class="card-header">
      <h6 class="text-primary" style="font-style: italic;">Plano de Ensino <?php echo $vetorUmregistro["nome_plano"]; ?></h6>
      </div>
    <div class="card-body">
    <form action="#"  method="POST">
        <div>
          <label class="validationDefault01"><h5 class="text-primary">Nome do plano de ensino</h5></label><br>
          <input type="text" class="form-control" name="nomePlano" id="validationDefault01" 
            value="<?php echo $vetorUmregistro['nome_plano'] ?>" required readonly>
        </div>
        <div>
          <label class="validationDefault02" ><h5 class="text-primary">Nome do docente</h5> </label><br>
          <input type="text" class="form-control" name="nomeDocente" id="validationDefault02"
          value="<?php echo $vetorUmregistro['nome_docente'] ?>" required readonly>
        </div><br>  
        <div class="form-row">
          <div class="col-9">
            <label id="validationDefault03"><h5 class="text-primary">Curso</h5></label><br>
            <input type="text" class="form-control" name="nomeCurso" id="validationDefault03"
              value="<?php echo $vetorUmregistro['curso_plano'] ?>" required readonly>
          </div>
          <div class="col-3">
            <label id="validationDefault04"> <h5 class="text-primary">Período do Curso</h5></label><br>
            <input type="text" class="form-control" name="periodoC" id="validationDefault04"
              value="<?php echo $vetorUmregistro['periodoC_plano'] ?>" required readonly>
           </div>
        </div>                           
        <div class="form-row mt-4">
          <div class="col-4">
            <label class="validationDefault05"><h5 class="text-primary">Nome da Disciplina</h5></label><br>
            <input type="text" class="form-control" id="validationDefault05"
              value="<?php echo $vetorUmregistro['nomeDisc_plano'] ?>" required readonly>
          </div>
          <div class="col-4">
            <label class="validationDefault06"><h5 class="text-primary">Carga Horária</h5></label><br>
            <input type="text" class="form-control" id="validationDefault06"
              value="<?php echo $vetorUmregistro['carga_plano'] ?>" required readonly>
          </div>
          <div class="col-4">
            <label id="validationDefault07"><h5 class="text-primary">N° de semanas aula </h5></label><br>
            <input type="text" class="form-control" id="validationDefault07"
            value="<?php echo $vetorUmregistro['semanas_plano'] ?>" required readonly>
          </div>
        </div>                
        <div class="form-row mt-4">
          <div class="col-3">
            <label class="validationDefault08"><h5 class="text-primary">Aulas teóricas</h5></label><br>
            <input type="text" class="form-control" name="aulasT" id="validationDefault08"
              value="<?php echo $vetorUmregistro['aulasT_plano'] ?>" required readonly>
          </div>
          <div class="col-3">
            <label class="validationDefault09"><h5 class="text-primary">Aulas práticas</h5></label><br>
            <input type="text" class="form-control" name="aulasP" id="validationDefault09"
              value="<?php echo $vetorUmregistro['aulasP_plano'] ?>" required readonly>
          </div>
          <div class="col-3">
            <label class="validationDefault10"><h5 class="text-primary">Aulas no laboratório</h5></label><br>
            <input type="text" class="form-control" name="aulasL" id="validationDefault10"
              value="<?php echo $vetorUmregistro['aulasL_plano'] ?>" required readonly>
          </div>
          <div class="col-3">
            <label class="validationDefault11"><h5 class="text-primary">Laboratório</h5></label><br>
            <input type="text" class="form-control" name="laboratorio" id="validationDefault11"
              value="<?php echo $vetorUmregistro['laboratorio'] ?>" required readonly>            
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-md-12 mt-4">
          <label class="validationDefault12">
          <h5 class="text-primary">Ementa</h5>
          </label><br>
          <textarea name="ementaDisc" class="char valid form-control" rows="4" id="validationDefault12" required
            readonly><?php echo $vetorUmregistro['ementa_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault13">
          <h5 class="text-primary">Objetivos Gerais</h5>
          </label><br>
          <textarea name="objetivosG" class="char valid form-control" rows="4" id="validationDefault13" required
           readonly><?php echo $vetorUmregistro['objetivosG_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
            <label class="validationDefault14">
            <h5 class="text-primary">Objetivos Especificos</h5>
            </label><br>
            <textarea name="objetivosE" class="char valid form-control" rows="4" id="validationDefault14" required readonly><?php echo $vetorUmregistro['objetivosE_plano'] ?></textarea>
          </div>
        <div class="col-md-12 mt-4">
          <label class="validationDefault15">
          <h5 class="text-primary">Avaliação da Aprendizagem</h5>
          </label><br>
          <textarea name="aprendizagem" class="char valid form-control" rows="4" id="validationDefault15" required readonly><?php echo $vetorUmregistro['aprendizagem'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault16">
          <h5 class="text-primary">Referencias Bibliográficas</h5>
          </label><br>
          <textarea name="referencias_plano" class="char valid form-control" rows="4" id="validationDefault16" required readonly ><?php echo $vetorUmregistro['referencias_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault17">
          <h5 class="text-primary">Referencias Complementares</h5>
          </label><br>
          <textarea name="complementares" class="char valid form-control" rows="4" id="validationDefault17" required readonly><?php echo $vetorUmregistro['complementares'] ?></textarea>
          </div>
         </div>
         <div class="form-row mt-4">
          <div class="col-5">
            <h5 class="text-primary text-center">1° Bimestre</h5>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <h5 class="text-primary text-center">2° Bimestre</h5>
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-5">
            <label class="validationDefault18"><h5 class="text-primary text-center">P1</h5></label><br>
            <input type="date" class="form-control" name="p1primeiro" id="validationDefault18"
              value="<?php echo $vetorUmregistro['p1_primeiro'] ?>" required readonly><br>
            <label class="validationDefault19"><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2primeiro" id="validationDefault19"
              value="<?php echo $vetorUmregistro['p2_primeiro'] ?>" required readonly><br>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <label class="validationDefault20"><h5 class="text-primary text-center">P1</h5></label><br>
            <input type="date" class="form-control" name="p1segundo" id="validationDefault20"
              value="<?php echo $vetorUmregistro['p1_segundo'] ?>" required readonly><br>
            <label class="validationDefault21"><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2segundo" id="validationDefault21"
              value="<?php echo $vetorUmregistro['p2_segundo'] ?>" required readonly><br>
          </div>
         </div>
           <small id="notificacao" class="form-text text-muted">Seu plano de ensino foi aprovado, não é possivel realizar mais alterações</small>
        </form>
    </div>
  </div>
 </div>

 <?php }if($vetorUmregistro["situacao"]=="Novo"){ ?>

  <div class="col-md-12 mt-4">
    <div class="card" style="background-color: #212529;">
      <div class="card-header">
      <h6 class="text-primary" style="font-style: italic;">Plano de Ensino <?php echo $vetorUmregistro["nome_plano"]; ?></h6>
      </div>
    <div class="card-body">
      <?php
                        if(isset($_SESSION["erroAlterac"])):
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION["erroAlterac"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["erroAlterac"]);
                            endif
                        ?>
                        <?php
                            if(isset($_SESSION["alteracao"])):
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION["alteracao"]; ?>
                        </div>
                        <?php
                            unset($_SESSION["alteracao"]);
                            endif
                        ?>
    <form action="SalvarPlano.php" method="POST">
        <div>
          <input type="hidden" class="form-control" name="id_plano" 
            value="<?=$vetorUmregistro['id_plano'] ?>">
        </div>
        <div>
          <label ><h5 class="text-primary">Nome do plano de ensino</h5></label><br>
          <input type="text" class="form-control" name="nomePlano" 
            value="<?php echo $vetorUmregistro['nome_plano'] ?>">
        </div>
        <div>
          <label ><h5 class="text-primary">Nome do docente</h5> </label><br>
          <input type="text" class="form-control" name="nomeDocente" 
          value="<?php echo $vetorUmregistro['nome_docente'] ?>">
        </div><br>  
        <div class="form-row">
          <div class="col-9">
            <label><h5 class="text-primary">Curso</h5></label><br>
            <input type="text" class="form-control" name="nomeCurso" 
              value="<?php echo $vetorUmregistro['curso_plano'] ?>">
          </div>
          <div class="col-3">
            <label> <h5 class="text-primary">Período do Curso</h5></label><br>
            <input type="text" class="form-control" name="periodoC"
              value="<?php echo $vetorUmregistro['periodoC_plano'] ?>">
           </div>
        </div>                           
        <div class="form-row mt-4">
          <div class="col-4">
            <label><h5 class="text-primary">Nome da Disciplina</h5></label><br>
            <input type="text" class="form-control" name="nomeDisc"
              value="<?php echo $vetorUmregistro['nomeDisc_plano'] ?>">
          </div>
          <div class="col-4">
            <label><h5 class="text-primary">Carga Horária</h5></label><br>
            <input type="text" class="form-control" name="cargaDisc"
              value="<?php echo $vetorUmregistro['carga_plano'] ?>">
          </div>
          <div class="col-4">
            <label><h5 class="text-primary">N° de semanas aula </h5></label><br>
            <input type="text" class="form-control" name="semanaDisc"
            value="<?php echo $vetorUmregistro['semanas_plano'] ?>">
          </div>
        </div>                
        <div class="form-row mt-4">
          <div class="col-3">
            <label><h5 class="text-primary">Aulas teóricas</h5></label><br>
            <input type="text" class="form-control" name="aulasT" 
              value="<?php echo $vetorUmregistro['aulasT_plano'] ?>">
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Aulas práticas</h5></label><br>
            <input type="text" class="form-control" name="aulasP" 
              value="<?php echo $vetorUmregistro['aulasP_plano'] ?>">
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Aulas no laboratório</h5></label><br>
            <input type="text" class="form-control" name="aulasL"
              value="<?php echo $vetorUmregistro['aulasL_plano'] ?>">
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Laboratório</h5></label><br>
            <input type="text" class="form-control" name="laboratorio"
              value="<?php echo $vetorUmregistro['laboratorio'] ?>">            
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-md-12 mt-4">
          <label class="validationDefault07">
          <h5 class="text-primary">Ementa</h5>
          </label><br>
          <textarea name="ementaDisc" class="char valid form-control" rows="4" id="validationDefault07" required
          ><?php echo $vetorUmregistro['ementa_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault08">
          <h5 class="text-primary">Objetivos Gerais</h5>
          </label><br>
          <textarea name="objetivosG" class="char valid form-control" rows="4" id="validationDefault08" required
          ><?php echo $vetorUmregistro['objetivosG_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
            <label class="validationDefault09">
            <h5 class="text-primary">Objetivos Especificos</h5>
            </label><br>
            <textarea name="objetivosE" class="char valid form-control" rows="4" id="validationDefault09" required><?php echo $vetorUmregistro['objetivosE_plano'] ?></textarea>
          </div>
        <div class="col-md-12 mt-4">
          <label class="validationDefault10">
          <h5 class="text-primary">Avaliação da Aprendizagem</h5>
          </label><br>
          <textarea name="avaliacaoA" class="char valid form-control" rows="4" id="validationDefault10" required><?php echo $vetorUmregistro['aprendizagem'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault11">
          <h5 class="text-primary">Referencias Bibliográficas</h5>
          </label><br>
          <textarea name="referenciasB" class="char valid form-control" rows="4" id="validationDefault11" required ><?php echo $vetorUmregistro['referencias_plano'] ?></textarea>
          </div>
          <div class="col-md-12 mt-4">
          <label class="validationDefault12">
          <h5 class="text-primary">Referencias Complementares</h5>
          </label><br>
          <textarea name="referenciasC" class="char valid form-control" rows="4" id="validationDefault12" required><?php echo $vetorUmregistro['complementares'] ?></textarea>
          </div>
         </div>
         <div class="form-row mt-4">
          <div class="col-5">
            <h5 class="text-primary text-center">1° Bimestre</h5>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <h5 class="text-primary text-center">2° Bimestre</h5>
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-5">
            <label><h5 class="text-primary text-center">P1</h5></label><br>
            <input type="date" class="form-control" name="p1primeiro"
              value="<?php echo $vetorUmregistro['p1_primeiro'] ?>"><br>
            <label><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2primeiro"
              value="<?php echo $vetorUmregistro['p2_primeiro'] ?>"><br>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <label><h5 class="text-primary text-center">P1</h5></label><br>
            <input type="date" class="form-control" name="p1segundo"
              value="<?php echo $vetorUmregistro['p1_segundo'] ?>"><br>
            <label><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2segundo"
              value="<?php echo $vetorUmregistro['p2_segundo'] ?>"><br>
          </div>
         </div>

            <small id="notificacao" class="form-text text-muted">Seu plano de ensino ainda não foi submetido, isso significa que você pode realizar alterações antes de mandá-lo para correção</small>
            <button type="submit" class="btn btn-success mt-4">Salvar</button>
      </form>
    </div>
  </div>
 </div>
  <?php } ?>      

<?php require_once("Footer.php"); ?>
</div> 
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</html>


