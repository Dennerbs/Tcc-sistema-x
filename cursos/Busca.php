<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];


$query = mysqli_query($conexao, "SELECT * FROM planos WHERE nome_docente LIKE '%$campo%' or nome_plano LIKE '%$campo%'");
$num   = mysqli_num_rows($query);
if($num >0){ ?>
    <table class="table">
      <tr>
      <th>Plano</th>
      <th >Docente</th>
      <th >Situação</th>
      <th >Ação</th>
      </tr>
      <?php
        while($umRegistro = mysqli_fetch_assoc($query)){
          if($umRegistro["situacao"] != "Novo"){
            if($umRegistro["codigo_grupo"] == $_SESSION["codigo_grupo"] || $_SESSION["perfil"] == "Coordenador"){ 
              ?>
                <tr>
                  <?php if($umRegistro["situacao"] != "Agurdando"){ ?>
                  <td>
                  <form action="ValidacaoPlano.php" method="POST"> 
                    <input type="hidden" name="id_plan" value="<?= $umRegistro["id_plano"];?>">
                    <button type="submit" class=" btn  btn-block" ><p id="plano" class="text-left"><?= $umRegistro["nome_plano"]; ?></p></button>
                  </form>
                  <?php }else{ ?>
                    <td><?php echo $umRegistro["nome_plano"];?></td>
                  <?php } ?>
                   </td>
                   <td><?php echo $umRegistro["nome_docente"];?></td>
                  <td>
                  <?php if($umRegistro["situacao"] == "Corrigir Colegiado"){ ?>
                  <h6 style="background-color:#fbe531"> <?= $umRegistro["situacao"];?></h6>
                  <?php }if($umRegistro["situacao"] == "Aguardando"){ ?>
                  <h6 style="background-color:#fc6c5a"> <?= $umRegistro["situacao"];?></h6>
                  <?php }if($umRegistro["situacao"] == "Sucesso"){ ?>
                  <h6 style="background-color:#04b826;"> <?= $umRegistro["situacao"];?></h6>
                  <?php }?>
                  </td>
                  <td></td>
                   </tr>



              <?php
              }
            }
          }                
        
        }else{
          echo "Plano não encontrado";
        }
                //echo $row['nome_plano'].' - '.$row['situacao'].'<br /><hr>';





?>