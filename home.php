<?php
    session_start();
    if(!(isset($_SESSION['tipo_usuario']))){
        header("Location:./erro.php?erro=naologado");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Sistema Mostra </title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/js.js" type="text/javascript"></script>
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require_once('cabecalho_logado.html');
            if($_SESSION['tipo_usuario'] == 0){
               require_once('organizador.php'); 
            }
            if($_SESSION['tipo_usuario'] == 1){
               require_once('revisor.php'); 
            }
            if($_SESSION['tipo_usuario'] == 2){
               require_once('autor.php'); 
            }
        ?>
    </body>
</html> 
