    <?php 
        require_once("conexao.php");
        $nomeCurso= $_POST["nomeCurso"];
        $duracao = $_POST["duracao"];
        $carga = $_POST["cargahoraria"];
        $campus = $_POST["campus"];
        $descricaoCurso = $_POST["descricao"];
        $ementa = $_POST["ementa"];
        $idCurso = $_POST["idCurso"];
        $coordenador = $_POST["coordenador"];
        
        if($idCurso == 0){
        $sql = "insert into curso (nome_curso,duracao,cargahoraria,campus,descricao_curso,ementa,coordenador) values (?,?,?,?,?,?,?)";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("ssissss",$nomeCurso,$duracao,$carga,$campus,$descricaoCurso,$ementa,$coordenador);
        $sqlprep -> execute();
        }else{
            $sql = "update curso set nome_curso=?,duracao=?,cargahoraria=?,campus=?,descricao_curso=?,ementa=?,coordenador=? where id_curso=?";
            $sqlprep =$conexao ->prepare($sql);
            $sqlprep -> bind_param("ssissssi",$nomeCurso,$duracao,$carga,$campus,$descricaoCurso,$ementa,$coordenador,$idCurso);
            $sqlprep -> execute();   
        }
        header("location: ListarCurso.php");  
    ?>