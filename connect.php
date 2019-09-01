<?php
    try{
        @$db = new PDO('mysql:host=mysql.bkuhn.net.br;dbname=bkuhn01;charset=utf8', 'bkuhn01', 'sisamt');
        @$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Conexão efetuada com sucesso.';
    }
    catch(PDOException $e){
        echo "Ocorreu um erro em ".date('d/m/Y_H:i:s').".<br>Por favor, solicite ao administrador do sistema que verifique o log gerado em ".date('d/m/Y_h:m:i');
    }
?>