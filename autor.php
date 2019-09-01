 <div id="campos" style="text-align: right; margin-right:7%">
    <?php
        session_start();
        require_once('connect.php');
        $id_usuario = $_SESSION['id_usuario'];
        $stmt = $db->query('select nome FROM usuarios WHERE id_usuario = '.$id_usuario);
        $stmt->execute(array($id_usuario));
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
            echo "Olá, ".$row['nome'];
        }
    ?>
            <a href="sair.php"> Sair </a>
            <br><br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#artigo"> Cadastre um novo artigo </button>		 
            <!-- Modal -->
            <div id="artigo" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"> Cadastre um novo artigo </h4>
                        </div>
                        <div class="modal-body" style="text-align: center">
                            <p>
                                <form class="form-horizontal" name="formArtigo" action="cadastro_artigo.php" method="post" onsubmit="return verificaArtigo();">
                                    <div class="clear-both"></div>
                                    <br><br>
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
                                    <br><br>
                                    <div class="form-group">
                                        <label for="titulo"> Título: </label>
                                        <input class="form-control" tipe="text" id="titulo" name="titulo"/>
                                    </div>
                                    <div class="clear-both"></div>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="resumo"> Resumo: </label>
                                        <textarea class="form-control" rows="5" id="resumo" name="resumo"> </textarea>
                                    </div>
                                    <div class="form-field"><input type="submit" name="botao" value="Cadastrar"> </div>
                                </form>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="trabalhos" style="width: 70%; margin-left: 15%; margin-top: 3%">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Cod. </th>
                        <th> Trabalho </th>
                        <th> Área </th>
                        <th> Situação </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        require_once('connect.php');                        
                        $stmt = $db->query("SELECT DISTINCT artigos.situacao as situacao_artigo, artigos.id_artigo as id_artigo, artigos.titulo as titulo_artigo, areas_conhecimento.desc_area_conhecimento as artigo_area_conhecimento FROM artigos, usuarios, areas_conhecimento WHERE artigos.autor=".$_SESSION['id_usuario']." and artigos.area_conhecimento=areas_conhecimento.id_area_conhecimento ORDER BY artigos.area_conhecimento, artigos.media_nota");
                        $stmt->execute(array($artigos));
						$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($rows as $row) {
							if($row['situacao_artigo']==0){
								$situacao = "Aguardando avaliação";
							}
							if($row['situacao_artigo']==1){
								$situacao = "Aprovado";
							}
							if($row['situacao_artigo']==2){
								$situacao = "Reprovado";
							}
                            echo "<tr>";
                            echo "<td>".$row['id_artigo']."</td><td>".$row['titulo_artigo']."</td><td>".$row['artigo_area_conhecimento']."</td><td>".$situacao."</td>";
                            echo '<td>
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#visualizar_artigo"> Visualizar artigo </button>		 
				            <!-- Modal -->
				            <div id="visualizar_artigo" class="modal fade" role="dialog">
				                <div class="modal-dialog">
				                    <!-- Modal content-->
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <h4 class="modal-title"> Visualizar artigo </h4>
				                        </div>
				                        <div class="modal-body" style="text-align: center">
				                            <p>
				                                Título: '.$row['titulo_artigo'].'
				                                <br><br>
				                                Resumo:
				                            </p>
				                        </div>
				                        <div class="modal-footer">
				                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				                        </div>
				                    </div>
				                </div>
				            </div> 
				        </td>
                        <td>
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#visualizar_avaliacao"> Visualizar avaliação </button>		 
				            <!-- Modal -->
				            <div id="visualizar_avaliacao" class="modal fade" role="dialog">
				                <div class="modal-dialog">
				                    <!-- Modal content-->
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <h4 class="modal-title"> Avaliação do artigo </h4>
				                        </div>
				                        <div class="modal-body" style="text-align: center">
				                            <p>
				                                Competência 1:
				                                <br><br>
				                                Competência 2:
				                                <br><br>
				                                Competência 3:
				                                <br><br>
				                                Competência 4:
				                            </p>
				                        </div>
				                        <div class="modal-footer">
				                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				                        </div>
				                    </div>
				                </div>
				            </div> 
                        </td>'; } ?>
                    </tr>
                </tbody>
            </table>
            <a href="trabalhos.php"> Visualizar todos os trabalhos </a>
        </div>
    </div>
</div>
