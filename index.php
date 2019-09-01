<html>
    <head>
        <meta charset="UTF-8">
        <title> SiSAMT </title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/js.js" type="text/javascript"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            require("cabecalho_logar.html");
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding: 1%">
                    <div id="descricao" >
                            <?php
                                require_once('connect.php');
                                
                                $descricao = $db->query('select nome_evento, desc_evento from evento where id_evento = 1');
                                foreach($descricao as $desc){
                                    echo "<legend>".$desc['nome_evento']."</legend>";
                                    echo "<p style='text-align: justify; padding: 3%'>".$desc['desc_evento']."</p>";

                                }
                                
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 1%">
                        <div id="trabalhos">
                            <table class="table table-striped table-responsive">
                                <legend>Artigos aprovados para o evento</legend>
                                <thead>
                                    <tr>
                                        <th> Cód. </th>
                                        <th> Autor </th>
                                        <th> Trabalho </th>
                                        <th> Area do conhecimento </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        
                                        $stmt = $db->query('select artigos.id_artigo as id_artigo, usuarios.nome as nome_usuario, artigos.titulo as titulo_artigo, areas_conhecimento.desc_area_conhecimento as artigo_area_conhecimento FROM artigos, usuarios, areas_conhecimento WHERE artigos.autor=usuarios.id_usuario and artigos.area_conhecimento=areas_conhecimento.id_area_conhecimento LIMIT 0,5');
                                        foreach($stmt as $row) {
                                            echo "<tr>";
                                            echo "<td>".$row['id_artigo']."</td><td>".$row['nome_usuario']."</td><td>".$row['titulo_artigo']."</td><td>".$row['artigo_area_conhecimento']."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <a href="trabalhos.php"> Visualizar todos os trabalhos </a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
