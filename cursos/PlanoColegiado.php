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
        #comentario{
        border: 2px solid #F5A9D0;
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
        <div class="row">
    <div class="col-md-12 mt-4">
    <div class="card">
      <div class="card-header">
      <h6 class="text-primary" style="font-style: italic;">Plano de Ensino <?php echo $vetorUmregistro["nome_plano"]; ?></h6>
      </div>
    <div class="card-body">
        <div>
        <?php
        if($vetorUmregistro['situacao']=="Corrigir Colegiado"){
        if(($_SESSION["perfil"]=="Pedagogo")||($_SESSION["perfil"]=="Discente do Colegiado")||($_SESSION["perfil"]=="Docente do Colegiado")||($_SESSION["perfil"]=="Tecnico do Colegiado")){ ?>

        <?php }} ?>
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
          <div class="col-3">
            <label ><h5 class="text-primary">Campus</h5> </label><br>
            <input type="text" class="form-control" name="campus" value="<?= $vetorUmregistro['campus']?>" readonly>
          </div>
          <div class="col-3">
          <label ><h5 class="text-primary">Ano / Semestre</h5> </label><br>
          <input type="text" class="form-control" name="anoSemestre" value="<?= $vetorUmregistro['anoSemestre']?>" readonly>
          </div>
        </div>   
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
         <div class="form-row mt-4">
        <div class="col-md-12">
          <?php $sql = "select * from detalhamento where id_plano = $idplano";
        $resultadoSql = mysqli_query($conexao, $sql);
        $vetorRegistro = mysqli_fetch_assoc($resultadoSql);
        $vetorDetalhamento = array();
        while($vetorRegistro !=null){
          array_push($vetorDetalhamento,$vetorRegistro);
          $vetorRegistro = mysqli_fetch_assoc($resultadoSql);}
          ?> <table id="employee_table" align="left">
           <tr><th><h5 class="text-primary">Mês</h5></th>
           <th><h5 class="text-primary">Conteudo</h5></th></tr>
          <?php foreach($vetorDetalhamento as $Umregistro){ ?> 
            <tr id="row1">
            <td><input type='text' class='form-control' value="<?php echo $Umregistro['mes']?>" name='mes' readonly></td>
            <td>
              <textarea name="con" class="char valid form-control" style="width:100%;" rows="1" id="validationDefault07" required readonly
              ><?php echo $Umregistro['conteudo'] ?></textarea> 
            </td>
        <?php } ?>
            </tr>
          </table> 
        </div>  
         </div>
         <?php if(($_SESSION["perfil"]=="Pedagogo")||($_SESSION["perfil"]=="Discente do Colegiado")||($_SESSION["perfil"]=="Docente do Colegiado")||($_SESSION["perfil"]=="Tecnico do Colegiado") ||($_SESSION["perfil"]=="Coordenador")){ ?>
          <div class="row">
            <div class="col-md-12">         
              <label class="validationDefault21"><h5 class="text-primary text-center">Comentários</h5></label><br>
              <div id="comentario" class="overflow-auto w-auto p-2" style="height:450px;">
              <?php $sql = "select * from comentarios where id_plano=?";
              $sqlprep = $conexao->prepare($sql);
              $sqlprep->bind_param("i",$idplano);
              $sqlprep->execute();
              $registro = $sqlprep->get_result();
              $vetorRegistro= mysqli_fetch_assoc($registro);
              $vetorTodosRegistros = array();
              while($vetorRegistro !=null){
                array_push($vetorTodosRegistros,$vetorRegistro);
                $vetorRegistro = mysqli_fetch_assoc($registro);
              }foreach($vetorTodosRegistros as $valor){ ?>
                <div>  
                <h6 class="font-weight-bold"><?php echo $valor["usuario"]; ?> (<?php echo $valor["perfil"]; ?>):</h6> 
                <?php echo $valor["comentario"]; ?><br> <small class="text-primary"><?php echo $valor["horario"];?></small>
              </div><br><br>
              <?php } ?>
              </div>
            </div>
          </div>
          <form method="POST" action="PlanoComentarios.php">
            <input type="hidden" name="idplano" value="<?=$idplano;  ?>">
            <input type="hidden" name="nome" value="<?=$_SESSION["nome"]; ?>">
            <input type="hidden" name="perfil" value="<?=$_SESSION["perfil"]; ?>">
              <div class="form-row mt-4"> 
              <div class="col-md-12 mt-4">
                <label class="validationDefault22">
                  <h5 class="text-primary">Suas observações</h5>
                </label><br>
              <textarea name="comentario" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required form-control w-100" aria-required="true" aria-invalid="false"></textarea>
              </div>
                <div class="col-md-12">
                  <button type="submit" style="width:15rem;" class="btn btn-warning mt-4">Salvar observações</button>
                </div>
              </form>
            <?php }if($_SESSION["perfil"]=="Coordenador"){ ?>
                <div class="col-md-12">
                  <form method="POST" action="PlanoEvolucao.php">
                    <input type="hidden" name="idplano" value="<?=$idplano; ?>">
                    <button type="submit" style="width:15rem;" class="btn btn-danger mt-3">Retornar ao docente</button>
                  </form>
                  <form method="POST" action="PlanoEvolucao.php">
                    <input type="hidden" name="idplano" value="<?=$vetorUmregistro['id_plano'];?>">
                    <input type="hidden" name="finalizado" value="finalizado">
                    <button type="submit" style="width:15rem;" class="btn btn-success mt-3">Aprovar plano de ensino</button>
                  </form>

                </div>

             <?php }if($_SESSION["perfil"]=="Docente"){ ?>
            <div class="row">
            <div class="col-md-12">         
              <label class="validationDefault21"><h5 class="text-primary text-center">Comentários sobre este plano</h5></label><br>
              <div id="comentario" class="overflow-auto w-auto p-2" style="height:450px;">
                <?php $sql = "select * from comentarios where id_plano=?";
              $sqlprep = $conexao->prepare($sql);
              $sqlprep->bind_param("i",$vetorUmregistro["id_plano"]);
              $sqlprep->execute();
              $registro = $sqlprep->get_result();
              $vetorRegistro= mysqli_fetch_assoc($registro);
              $vetorTodosRegistros = array();
              while($vetorRegistro !=null){
                array_push($vetorTodosRegistros,$vetorRegistro);
                $vetorRegistro = mysqli_fetch_assoc($registro);
              }foreach($vetorTodosRegistros as $valor){ ?>
                <div>  
                <h6 class="font-weight-bold"><?php echo $valor["usuario"]; ?> (<?php echo $valor["perfil"]; ?>):</h6> 
                <?php echo $valor["comentario"]; ?><br> <small class="text-primary"><?php echo $valor["horario"];?></small>
              </div><br><br>
              <?php } ?>
              </div>
            </div>
          </div>
            <small id="notificacao" class="form-text text-muted">Seu plano de ensino foi enviado para correção, Aguarde ^^</small><br>      
      <?php  } ?>
  </div>
 </div>
 </div>
 <?php 
 require_once("Footer.php");
  ?>
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
