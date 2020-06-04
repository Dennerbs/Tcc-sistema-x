<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];


$query = mysqli_query($conexao, "SELECT * FROM planos WHERE nome_docente LIKE '%$campo%' or nome_plano LIKE '%$campo%' or id_plano LIKE '%$campo%'");
$num   = mysqli_num_rows($query);
if($num >0){ ?>
    <table class="table">
      <tr>
      <th>Plano</th>
      <th>Docente</th>
      <th>Situação</th>
      <th>Grupo Responsável</th>
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
                  <?php if($umRegistro["situacao"] == "Novo"){ ?>
                            <h6 style="background-color:#ADD8E6;"> <?= $umRegistro["situacao"];?></h6>
                            <?php } if($umRegistro["situacao"] == "Corrigir Colegiado"){
                                if($umRegistro["codigo_grupo"] !=""){ ?>
                            <h6 style="background-color:#be70ff">Um grupo está corrigindo</h6>  
                                <?php }else{?>
                            <h6 style="background-color:#fbe531">Aguardando correções</h6>
                            <?php }}if($umRegistro["situacao"] == "Aguardando"){ ?>
                            <h6 style="background-color:#fc6c5a">Aguardando docente</h6>
                            <?php }if($umRegistro["situacao"] == "Sucesso"){ ?>
                            <h6 style="background-color:#04b826;">Plano aprovado</h6>
                            <?php }if($umRegistro["situacao"] == "Aprovado"){ ?>
                            <h6 style="background-color:#ccff7e;">Aprovado pelo grupo</h6>
                            <?php }if($umRegistro["situacao"] == "Reprovado"){ ?>
                            <h6 style="background-color:#ff6e4c;">Reprovado pelo grupo</h6>
                            <?php }?>
                            
                            
                  </td>
                  <td>
                  #<?php echo $umRegistro["codigo_grupo"];?>
                  </td>
                   </tr>



              <?php
              }
            }
          }                
        
        }else{
          echo "Plano não encontrado";
        }






?>