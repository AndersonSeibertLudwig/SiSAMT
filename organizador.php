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
        <div id="trabalhos" style="width: 70%; margin-left: 15%; margin-top: 3%">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr style="text-align: center;">
                        <th> Cod. </th>
                        <th> Autor </th>
                        <th> Área </th>
                        <th> Artigo </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        <?php
	                        require_once('connect.php');
	                        $stmt = $db->query('select artigos.id_artigo as id_artigo, usuarios.nome as nome_usuario, artigos.titulo as titulo_artigo, areas_conhecimento.desc_area_conhecimento as artigo_area_conhecimento, resumo FROM artigos, usuarios, areas_conhecimento WHERE artigos.autor=usuarios.id_usuario and artigos.area_conhecimento=areas_conhecimento.id_area_conhecimento ORDER BY artigos.area_conhecimento, artigos.media_nota');
	                        foreach($stmt as $row) {
	                            echo "<tr>";
	                            echo "<td>".$row['id_artigo']."</td><td>".$row['nome_usuario']."</td><td>".$row['titulo_artigo']."</td><td>".$row['artigo_area_conhecimento']."</td>";
	                        	echo '
                        <td>
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#Visualizar'.$row['id_artigo'].'"> Visualizar artigo </button>		 
				            <!-- Modal -->
				            <div id="Visualizar'.$row['id_artigo'].'" class="modal fade" role="dialog">
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
				                                Resumo: '.$row['resumo'].'
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
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#atribuir'.$row['id_artigo'].'"> Atribuir artigo </button>		 
				            <!-- Modal -->
				            <div id="atribuir'.$row['id_artigo'].'" class="modal fade" role="dialog">
				                <div class="modal-dialog">
				                    <!-- Modal content-->
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <h4 class="modal-title"> Atribuir artigo </h4>
				                        </div>
				                        <div class="modal-body" style="text-align: center">
				                            <p>
				                            	<form class="form-horizontal" name="formAtribuirArtigo" action="atribuir.php" method="post" onsubmit="return verificaArtigo();">
				                                    <input type="hidden" name="id_artigo" value="'.$row['id_artigo'].'">
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    Área do conhecimento:
				                                    <select class="selectpicker" name="revisor">';
                                                        $id_artigo = $row['id_artigo'];
                                                        $query_revisores = "select usuarios.id_usuario as id_usuario, usuarios.nome as nome_usuario FROM usuarios, artigos WHERE usuarios.area=artigos.area_conhecimento AND usuarios.tipo_usuario = 1 AND artigos.id_artigo = ?";
                                                        $stmt = $db->prepare($query_revisores);
                                                        $stmt->execute(array($id_artigo));
                                                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach($rows as $row){
                                                            $nome_revisor = $row['nome_usuario'];
                                                            $area_conhecimento = $row['area_conhecimento'];
                                                            echo "<option value='".$row['id_usuario']."'> ".$nome_revisor."</option>";
                                                        }
                                                        echo'
				                                    </select>
					                                <br><br>
					                                <div class="form-field"><input type="submit" name="botao" value="Atribuir"> </div>
				                                </form>
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
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#rejeitar'.$id_artigo.'"> Rejeitar artigo </button>		 
				            <!-- Modal -->
				            <div id="rejeitar'.$id_artigo.'" class="modal fade" role="dialog">
				                <div class="modal-dialog">
				                    <!-- Modal content-->
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <h4 class="modal-title"> Rejeitar artigo </h4>
				                        </div>
				                        <div class="modal-body" style="text-align: center">
				                            <p>
				                            	<form class="form-horizontal" name="formRejeitarArtigo" action="rejeitar.php" method="post" onsubmit="return verificaArtigo();">
				                                    <input type="hidden" name="id_artigo" value="'.$id_artigo.'">
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    Tem certeza que deseja rejeitar o artigo?
				                                    <br><br>
					                                <div class="form-field"><input class="btn btn-default" type="submit" name="botao" value="Sim">
					                                <button type="button" class="btn btn-default" data-dismiss="modal">Não</button> </div>
				                                </form>
				                            </p>
				                        </div>
				                    </div>
				                </div>
				            </div> 
                        </td>
                    </tr>';
                } ?>
                </tbody>
            </table>
            <a href="trabalhos.php"> Visualizar todos os trabalhos </a>
        </div>
    </div>
</div>