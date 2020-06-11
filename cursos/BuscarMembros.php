<?php
require_once("Conexao.php");
session_start();
$campo =  $_POST['campo'];


$query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE nome LIKE '%$campo%' ORDER BY nome ASC");
$num   = mysqli_num_rows($query);
if($num >0){ ?>
     
      <?php
        while($umRegistro = mysqli_fetch_assoc($query)){ 
             if($umRegistro["id"] != $_SESSION['id_logado']){ 
              ?>
                <li class="list-group-item">
                <div class="col-md-12">
                    <form action="chat.php" method="POST">
                        <input type="hidden" name="id" value="<?=$umRegistro["id"]; ?>">
                        <input type="hidden" name="nome" value="<?=$umRegistro["nome"]; ?>">
                        <div class="form-group">  
                            <?php
                        $sql = "select id,nome from imagens where id_usuario=?";
                        $sqlprep = $conexao->prepare($sql);
                        $sqlprep->bind_param("i",$umRegistro['id']);
                        $sqlprep->execute();
                        $resultadoSql = $sqlprep->get_result();
                        $registro= mysqli_fetch_assoc($resultadoSql);
                        $vetorRegistros = array();
                        while($registro !=null){
                            array_push($vetorRegistros,$registro);
                            $registro = mysqli_fetch_assoc($resultadoSql);
                        }
                        $idfoto = 0;
                        foreach($vetorRegistros as $valor):
                            $idfoto = $valor["id"];
                            $foto =$valor["nome"];                  

                        endforeach;
                        //var_dump($imagens);
                        if($idfoto != null){ ?>
                            <img src="<?php echo "./imagens/".$foto; ?>" style="width:80px; height:80px;">
                        <?php
                        }else{ ?>
                            <img src="imagens/usuario.png" style="width:80px; height:80px;">
                        <?php
                        } ?>
                            <button id="botaocontato" type="submit" class="btn btn-outline-primary ml-3"><?=$umRegistro["nome"]; ?></button> 
                        </div>

                    </form>
                </div>
                </li>
            <?php }
        }?>    
        <?php }else{
          echo "Curso não encontrado";
        }







?>