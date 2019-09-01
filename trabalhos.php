<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Sistema Mostra </title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php            
            if(isset($_SESSION['tipo_usuario'])){
                require_once('cabecalho_logado.html');
            }
            else{
                require_once('cabecalho_logar.html');
            }                
        ?>
        <div id="trabalhos" style="width: 40%; margin: 10% auto; text-align: center">
            <table class="table table-striped table-responsive table-hover">
                <legend style="text-align: justify"><h3>Artigos aprovados para o evento</h3></legend>
                <thead>
                    <tr>
                        <th> Cód. </th>
                        <th> Autor </th>
                        <th> Artigo </th>
                        <th> Areas do conhecimento </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once('connect.php');
                        
                        $stmt = $db->query('select artigos.id_artigo as id_artigo, usuarios.nome as nome_usuario, artigos.titulo as titulo_artigo, areas_conhecimento.desc_area_conhecimento as artigo_area_conhecimento FROM artigos, usuarios, areas_conhecimento WHERE artigos.autor=usuarios.id_usuario and artigos.area_conhecimento=areas_conhecimento.id_area_conhecimento ORDER BY artigos.area_conhecimento, artigos.media_nota');
                        foreach($stmt as $row) {
                            echo "<tr>";
                            echo "<td>".$row['id_artigo']."</td><td>".$row['nome_usuario']."</td><td>".$row['titulo_artigo']."</td><td>".$row['artigo_area_conhecimento']."</td>";
                            echo "</tr>";
                        }
                        
                   ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
