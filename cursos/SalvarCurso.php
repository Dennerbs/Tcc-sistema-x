    <?php 
        require_once("conexao.php");
        $nomeCurso= $_POST["nomeCurso"];
        $descricaoCurso = $_POST["descricaoCurso"];
        $idCurso = $_POST["idCurso"];
        
        if($idCurso == 0){
        $sql = "insert into curso (nome_curso,descricao_curso) values (?,?)";
        $sqlprep =$conexao ->prepare($sql);
        $sqlprep -> bind_param("ss",$nomeCurso, $descricaoCurso);
        $sqlprep -> execute();
        }else{
            $sql = "update curso set nome_curso=?,descricao_curso=? where id_curso=?";
            $sqlprep =$conexao ->prepare($sql);
            $sqlprep -> bind_param("ssi",$nomeCurso, $descricaoCurso,$idCurso);
            $sqlprep -> execute();   
        }
        header("location: FormCurso.php");  
    ?>