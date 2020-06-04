<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];
$nome = $_SESSION['nome'];
$query = mysqli_query($conexao, "SELECT * FROM planos WHERE nome_plano LIKE '%$campo%' AND nome_docente='$nome'");
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
        
        }else{
          echo "Plano não encontrado";
        }
                //echo $row['nome_plano'].' - '.$row['situacao'].'<br /><hr>';





?>