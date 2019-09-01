<div id="campos" style="text-align: right; margin-right:7%">
    <a href="sair.php"> Sair </a>
    <br><br>
        <div id="trabalhos" style="width: 70%; margin-left: 15%; margin-top: 3%">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Cód. </th>
                        <th> Autor </th>
                        <th> Área </th>
                        <th> Artigo </th>
                        <th> Ações </th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <?php
                                $id_artigo = "id_artigo";
                                $artigo_autor = "artigo_autor";
                                $artigo_area = "artigo_area";
                                $artigo_titulo = "artigo_titulo";
                                
                                echo '<td> '.$id_artigo.' </td>
                                        <td> '.$artigo_autor.' </td>
                                        <td> '.$artigo_area.' </td>
                                        <td> '.$artigo_titulo.' </td>
                                        <td>
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
                                                                    Título:
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
                        	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#avaliacao"> Avaliar artigo </button>		 
				            <!-- Modal -->
				            <div id="avaliacao" class="modal fade" role="dialog">
				                <div class="modal-dialog">
				                    <!-- Modal content-->
				                    <div class="modal-content">
				                        <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <h4 class="modal-title"> Avaliação do artigo </h4>
				                        </div>
				                        <div class="modal-body" style="text-align: center">
				                            <p>
				                            	<form class="form-horizontal" name="formAvaliacaoArtigo" action="" method="post" onsubmit="return verificaArtigo();">
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    <div class="form-group">
					                                    <label for="resumo"> Competência 1: </label>
					                                    <textarea class="form-control" rows="5" id="resumo"> </textarea>
					                                </div>
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    <div class="form-group">
				                                        <label for="resumo"> Competência 2: </label>
				                                        <textarea class="form-control" rows="5" id="resumo"> </textarea>
				                                    </div>
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    <div class="form-group">
				                                        <label for="resumo"> Competência 3: </label>
				                                        <textarea class="form-control" rows="5" id="resumo"> </textarea>
				                                    </div>
				                                    <div class="clear-both"></div>
				                                    <br><br>
				                                    <div class="form-group">
				                                        <label for="resumo"> Competência 4: </label>
				                                        <textarea class="form-control" rows="5" id="resumo"> </textarea>
				                                    </div>
				                                    <div class="form-field"><input type="submit" name="botao" value="Avaliar"> </div>
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
                    </tr>
';

                        ?>
                </tbody>
            </table>
            <a href="trabalhos.php"> Visualizar todos os trabalhos </a>
        </div>
    </div>
</div>
 
