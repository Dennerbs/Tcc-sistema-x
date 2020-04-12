<!doctype html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body >
    <div class="container">
      <?php 
     
    require_once('Cabecalho.php');
    require_once('Conexao.php');
    $idplano = 0;

    
    if(isset($_POST['id_plan'])){
      $idplano = $_POST['id_plan'];
    }
  
    
   
      
    $sql = "select * from planos where id_plano = $idplano";
    $resultadoSql = mysqli_query($conexao, $sql);
    $vetorUmregistro = mysqli_fetch_assoc($resultadoSql);

?>
  <div class="col-md-12 mt-4">
    <div class="card" style="background-color: #212529;">
      <div class="card-header">
      <h6 class="text-primary">Planos de Ensino</h6>
      </div>
    <div class="card-body">
    <form class=""  method="POST">
        <div>
          <label ><h5 class="text-primary">Nome do plano de ensino</h5></label><br>
          <input type="text" class="form-control" name="nomePlano" 
            value="<?php echo $vetorUmregistro['nome_plano'] ?>" readonly>
        </div>
        <div>
          <label ><h5 class="text-primary">Nome do docente</h5> </label><br>
          <input type="text" class="form-control" name="nomeDocente" 
          value="<?php echo $vetorUmregistro['nome_docente'] ?>" readonly>
        </div><br>  
        <div class="form-row">
          <div class="col-9">
            <label><h5 class="text-primary">Curso</h5></label><br>
            <input type="text" class="form-control" name="nomeCurso" 
              value="<?php echo $vetorUmregistro['curso_plano'] ?>" readonly>
          </div>
          <div class="col-3">
            <label> <h5 class="text-primary">Período do Curso</h5></label><br>
            <input type="text" class="form-control" name="periodoC"
              value="<?php echo $vetorUmregistro['periodoC_plano'] ?>" readonly>
           </div>
        </div>                           
        <div class="form-row mt-4">
          <div class="col-4">
            <label><h5 class="text-primary">Nome da Disciplina</h5></label><br>
            <input type="text" class="form-control" 
              value="<?php echo $vetorUmregistro['nomeDisc_plano'] ?>" readonly>
          </div>
          <div class="col-4">
            <label><h5 class="text-primary">Carga Horária</h5></label><br>
            <input type="text" class="form-control" 
              value="<?php echo $vetorUmregistro['carga_plano'] ?>" readonly>
          </div>
          <div class="col-4">
            <label><h5 class="text-primary">N° de semanas aula </h5></label><br>
            <input type="text" class="form-control" 
            value="<?php echo $vetorUmregistro['semanas_plano'] ?>" readonly>
          </div>
        </div>                
        <div class="form-row mt-4">
          <div class="col-3">
            <label><h5 class="text-primary">Aulas teóricas</h5></label><br>
            <input type="text" class="form-control" name="aulasT" 
              value="<?php echo $vetorUmregistro['aulasT_plano'] ?>" readonly>
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Aulas práticas</h5></label><br>
            <input type="text" class="form-control" name="aulasP" 
              value="<?php echo $vetorUmregistro['aulasP_plano'] ?>" readonly>
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Aulas no laboratório</h5></label><br>
            <input type="text" class="form-control" name="aulasL"
              value="<?php echo $vetorUmregistro['aulasL_plano'] ?>" readonly>
          </div>
          <div class="col-3">
            <label><h5 class="text-primary">Laboratório</h5></label><br>
            <input type="text" class="form-control" name="laboratorio"
              value="<?php echo $vetorUmregistro['laboratorio'] ?>" readonly>            
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-12">
            <label><h5 class="text-primary">Ementa</h5></label><br>
            <input type="text" class="form-control" name="ementa"
              value="<?php echo $vetorUmregistro['ementa_plano'] ?>" readonly>
          </div>
          <div class="col-12 mt-4">
            <label><h5 class="text-primary">Objetivos gerais</h5></label><br>
            <input type="text" class="form-control"name="objetivosG"
              value="<?php echo $vetorUmregistro['objetivosG_plano'] ?>" readonly>
          </div>
          <div class="col-12 mt-4">
            <label><h5 class="text-primary">Objetivos especificos</h5></label><br>
            <input type="text" class="form-control" name="objetivosE"
              value="<?php echo $vetorUmregistro['objetivosE_plano'] ?>" readonly>
          </div>
        </div>
        <div class="form-row mt-4">
          <div class="col-12">
            <label><h5 class="text-primary">Avaliação da aprendizagem</h5></label><br>
            <input type="text" class="form-control" name="avaliacaoA"
              value="<?php echo $vetorUmregistro['aprendizagem'] ?>" readonly> 
          </div>
          <div class="col-12 mt-2">
            <label><h5 class="text-primary">Rerencias Bibliograficas</h5></label><br>
            <input type="text" class="form-control" name="referenciasB"
            value="<?php echo $vetorUmregistro['referencias_plano'] ?>" readonly>
          </div>
          <div class="col-12 mt-2">
            <label> <h5 class="text-primary">Rerencias Complementares</h5></label><br>
            <input type="text" class="form-control" name="referenciasC" 
              value="<?php echo $vetorUmregistro['complementares'] ?>" readonly>
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
              value="<?php echo $vetorUmregistro['p1_primeiro'] ?>" readonly><br>
            <label><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2primeiro"
              value="<?php echo $vetorUmregistro['p2_primeiro'] ?>" readonly><br>
          </div>
          <div class="col-2"></div>
          <div class="col-5">
            <label><h5 class="text-primary text-center">P1</h5></label><br>
            <input type="date" class="form-control" name="p1segundo"
              value="<?php echo $vetorUmregistro['p1_segundo'] ?>" readonly><br>
            <label><h5 class="text-primary text-center">P2</h5></label><br>
            <input type="date" class="form-control" name="p2segundo"
              value="<?php echo $vetorUmregistro['p2_segundo'] ?>" readonly><br>
          </div>
         </div>  
        </form>
    </div>
  </div>
 </div>      
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
</html>


