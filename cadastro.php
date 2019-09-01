<html>
    <head>
        <meta charset="UTF-8">
        <title> Cadastre-se </title>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <!--script src="js/js.js" type="text/javascript"></script-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="css/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="titulo">
            <table>
                <tr>
                    <td>
                        <a href='./'><img aling="left" src="img/logo2.png"/></a>
                    </td>
                    <td>
                        <h1 style="margin-left: 125px" align="center"> Sistema de submissão de artigos para a Mostra Técnica </h1>
                    </td>
                </tr>
            </table>
        </div>
        <div id="campos_cadastro" class="form-group" style="margin-left: 15%; text-align: center; width:70%; background-color: rgba(220,220,220,0.4);">
            <h2 style="text-align: center"> Cadastre-se </h2>
            <form class="form-horizontal" name="formCadastro" action="cadastra.php" method="post" onsubmit="return verificaCadastro();">
                <div style="width:40%; margin:20 auto;">
                    <div class="form-field"> Nome Completo: <input class="form-control" type="text" name="nome" style="width:100%" required> </div><br>
                    <div class="clear-both"></div>
                    <div class="form-field">E-mail:</div> 
                    <div class="form-field"><input class="form-control" type="text" name="email" style="width:100%;" required> </div><br>
                    <div class="clear-both"></div>
                    Área do conhecimento:
                        <select class="selectpicker" name="area">
                            <?php
								require_once('connect.php');
								$stmt = $db->query('select id_area_conhecimento, desc_area_conhecimento FROM areas_conhecimento');
								$stmt->execute(array($id_area));
								$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
								foreach($rows as $row){
									echo "<option value=".$row['id_area_conhecimento'].">". $row['desc_area_conhecimento']." </option>";
								}
							?>
                        </select>
                    <div class="clear-both"></div>
                    <br>
                    <div class="form-field">Senha: </div> 
                    <div class="form-field"><input class="form-control" type="password" minlength=6 name="senha" style="width:100%;" required> </div><br>
                    <div class="clear-both"></div>
                    <div class="form-field">Confirmar Senha: </div> 
                    <div class="form-field"><input class="form-control" type="password" minlength=6 name="confirma" style="width:100%;" required> </div><br>
                    <div class="clear-both"></div>
                    <div class="form-field"><input type="submit" name="botao" value="Cadastrar"> </div>
                </div>
            </form>
        </div>
    </body>
</html>
