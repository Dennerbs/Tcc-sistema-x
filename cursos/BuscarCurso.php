<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];


$query = mysqli_query($conexao, "SELECT * FROM curso WHERE nome_curso LIKE '%$campo%'");
$num   = mysqli_num_rows($query);
if($num >0){ ?>
    <table class="table mt-4" style="background-color:#FFFFFF;">
        <tr>
            <th class="text-primary text-left" >Nome do Curso</th>
            <th class="text-primary text-left" >Duração Anos / Semestres</th>
            <th class="text-primary text-left" >Carga Horária</th>
            <th class="text-primary text-left" >Campus</th>
            <th class="text-primary text-left" >Descrição do Curso</th>
            <th class="text-primary text-left" >Ementa</th>
            <th class="text-primary text-left" >Coordenador</th>
            <th colspan="2" class="text-primary text-center">Alterações</th>
        </tr>
      <?php
        while($umRegistro = mysqli_fetch_assoc($query)){ ?>
            <tr>

                <td class="text-left" ><?=$umRegistro["nome_curso"];?></td>
                <td class="text-left" ><?=$umRegistro["duracao"];?></td>
                <td class="text-left" ><?=$umRegistro["cargahoraria"];?></td>
                <td class="text-left" ><?=$umRegistro["campus"];?></td>
                <td class="text-left" ><?=$umRegistro["descricao_curso"];?></td>
                <td class="text-left" ><?=$umRegistro["ementa"];?></td>
                <td class="text-left" ><?=$umRegistro["coordenador"];?></td>
                <td>
                    <form action="RemoverCurso.php" method="post">
                        <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                        <button type="submit" class="btn" style="background-color:#fc6c5a">Remover</button>
                    </form>
                </td>
                <td>
                    <form action="FormCurso.php" method="post">
                        <input type="hidden" name="id_curso" value="<?= $umRegistro["id_curso"]; ?>">
                        <button type="submit" class="btn" style="background-color:#ADD8E6;">Atualizar</button>
                    </form>
                </td>
            </tr>
            <?php  }?>
        </table>
        <?php }else{
          echo "Curso não encontrado";
        }






?>