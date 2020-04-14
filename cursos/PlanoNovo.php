<!DOCTYPE html>
<html>
<head>
    <title>Plano de Ensino</title>
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
        input{
opacity: 0.9;

        }
        #wp{
            color: #FFFFFF;
        }
        #sa{
            color: #01DF01;
        }

    </style>
</head>
<body>
    <div class="container">
    <?php
        require_once("Conexao.php");
        require_once("Cabecalho.php");

        $idplano=$_SESSION["id_plan"];

        $sql = "select * from planos where id_plano = $idplano";
        $resultadoSql = mysqli_query($conexao, $sql);
        $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);
    ?>
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
 </div>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>
</html>
