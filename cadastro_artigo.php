<?php
    session_start();
    require_once('connect.php');
    
    if(isset($_POST)){
        
        $area_post = $_POST['area'];
        $titulo_post = $_POST['titulo'];
        $resumo_post = $_POST['resumo'];
        $id_autor = $_SESSION['id_usuario'];
        try{
            $affected_rows = $db->exec("INSERT INTO artigos (evento, autor, titulo, area_conhecimento, resumo, situacao) VALUES (1, '$id_autor', '$titulo_post', '$area_post', '$resumo_post', 0)");
        header("location: home.php");
        }catch(PDOException $exception){
            echo "<p><b> Occorreu um erro! </b></p>";
            echo $exception->getMessage();
        }

    }
?>