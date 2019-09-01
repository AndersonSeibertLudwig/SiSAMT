<?php
    require_once('connect.php');
    if(isset($_POST)){
        $email_post = $_POST['login'];
        $senha_post = sha1($_POST['senha']);
        $email_bd;
        $senha_bd;
        $id_usuario;
        $tipo_usuario;
        try{
            $qr = "SELECT id_usuario, tipo_usuario, email, senha FROM usuarios WHERE email = '$email_post'";
            $stmt = $db->prepare($qr);
            $stmt->execute(array($email_post));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                $email_bd = $row['email'];
                $senha_bd = $row['senha'];
                $id_usuario = $row['id_usuario'];
                $tipo_usuario = $row['tipo_usuario'];
            }
            if(($email_post == $email_bd) and ($senha_post == $senha_bd)){
                //echo 'entrou nesse if - validou usuário e senha';
                session_start();
                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['tipo_usuario'] = $tipo_usuario;
                header("location: home.php");
            }else{
                header("Location:erro.php?erro=credenciais_invalidas");
            }
        }catch(PDOException $exception){
            echo "<p><b> Ocorreu um erro! </b></p>";
            echo $exception->getMessage();
        }
    }
?>
