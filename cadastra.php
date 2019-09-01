<?php
    session_start();
    require_once('connect.php');
    
    if(isset($_POST)){
        
        $nome_post = $_POST['nome'];
        $email_post = $_POST['email'];
        $area_post = $_POST['area'];
        $senha_post = sha1($_POST['senha']);
        $email_bd;
        
        try{
            $stmt = $db->prepare("SELECT email FROM usuarios WHERE email = '$email_post'");
            $stmt->execute(array($email_post));
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if($row){
                echo "<script>alert('E-mail já cadastrado!');"
                . "location.href='cadastro.php';</script>";
            }
            else{
                $query = "INSERT INTO usuarios (email, senha, tipo_usuario, nome, area) VALUES ('$email_post', '$senha_post', 2, '$nome_post', '$area_post')";
                echo $query."<Br>";
                $affected_rows = $db->exec($query);
				$stmt = $db->prepare("SELECT id_usuario FROM usuarios WHERE email = '$email_post'");
				$stmt->execute(array($id_post));
				$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($row as $r){
					$_SESSION['id_usuario'] = $r['id_usuario'];
				}
            }
            $_SESSION['tipo_usuario'] = 2;
             echo "<script>alert('Cadastro realizado com sucesso!');"
                . "location.href='home.php';</script>";

        }catch(PDOException $exception){
            echo "<p><b> Occorreu um erro! </b></p>";
            echo $exception->getMessage();
        }

    }
?>
