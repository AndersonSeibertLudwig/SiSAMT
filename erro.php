<?php
    $erro = $_GET['erro'];
    if($erro == 'naologado'){
        echo "Você não pode ver esta página. <a href='./'>Voltar</a>";
    }
    if($erro == "credenciais_invalidas"){
        echo "Credenciais inválidas. Por favor, <a href='./'>tente novamente</a> ou <a href='redefinir_senha.php'>redefina sua senha</a>";
    }
    
    else{
        header("Location:./");
    }