<?php
include('../../db/index.php');
include('../../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){

	$acao = $_REQUEST['acao'];

	switch($acao){
		case 'incluir':

			/* Lista as categorias */
			$q = odbc_exec($db, 'SELECT
									idCategoria,
									nomeCategoria,
									descCategoria
								 FROM
									Categoria');
			$i = 0;

			while($r = odbc_fetch_array($q)){
				$categorias[$i] = $r;
				$i++;
			}

			include('incluir_produto_tpl.php');

			break;
		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, "DELETE FROM
										Produto
									WHERE
										idProduto = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "Produto exclu&iacute;do com sucesso";
					}else{
						$erro = "Produto n&atilde;o existe";
					}
				}else{
					$erro = "Erro ao excluir o Produto";
				}
			}else{
				$erro = "ID inv&aacute;lido";
			}

			$q = odbc_exec($db, 'SELECT
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									ativoProduto,
									idUsuario,
									qtdMinEstoque,
									descontoPromocao,
									imagem
									FROM
										Produto');
			$i = 0;
			while($r = odbc_fetch_array($q)){
				$produtos[$i] = $r;
				$i++;
			}

			include('lista_produtos_tpl.php');

			break;

		case 'editar':

			$idProduto = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : NULL;

			if(isset($_POST['btnGravarProduto'])){

				extract($_POST);

				//trata nome
				$nome = str_replace('"','',$_POST['nome']);
				$nome = str_replace("'",'',$nome);
				$nome = str_replace(';','',$nome);
				$nome = utf8_decode($nome);

				if(odbc_exec($db, "	UPDATE
										Produto
									SET
										nomeProduto = '$nome',
										descProduto = '$descricao',
										precProduto = '$preco',
										qtdMinEstoque = '$estoque',
										idCategoria = '$idCategoria',
										imagem = 'imagem'
									WHERE
										idProduto = $idProduto")){
					$msg = "Produto gravado com sucesso";
				}else{
					$erro = "Erro ao gravar o Produto";
				}
			}

			/* Lista as categorias */
			$q = odbc_exec($db, 'SELECT
									idCategoria,
									nomeCategoria,
									descCategoria
								 FROM
									Categoria');
			$i = 0;

			while($r = odbc_fetch_array($q)){
				$categorias[$i] = $r;
				$i++;
			}

			$query_produto
				= odbc_exec($db, 'SELECT
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
									idCategoria,
									ativoProduto,
									idUsuario,
									qtdMinEstoque,
									imagem
								FROM
									Produto
								WHERE
									idProduto = '.$idProduto);

			$produto
				= odbc_fetch_array($query_produto);


			include('editar_produto_tpl.php');

			break;

		case 'buscar':

			$nomeProduto = $_GET['textoBusca'];

			$q = odbc_exec($db, "SELECT
									idProduto,
									nomeProduto,
									descProduto,
									precProduto,
									ativoProduto,
									idUsuario,
									qtdMinEstoque,
									descontoPromocao,
									imagem
									FROM
										Produto
									WHERE
										nomeProduto LIKE '%".$nomeProduto."%'");
			$i = 0;
			while($r = odbc_fetch_array($q)){
				$produtos[$i] = $r;
				$i++;
			}

			include('lista_produtos_tpl.php');

			break;

		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}

}else{

	//insere novo produto
	if(isset($_POST['btnNovoProduto'])) :

		// cadastra o produto
		if(odbc_exec($db, "INSERT INTO
								Produto
								(
									nomeProduto,
									descProduto,
									precProduto,
									descontoPromocao,
									idCategoria,
									ativoProduto,
									idUsuario,
									qtdMinEstoque
								)
							VALUES
								(
									'".utf8_decode($_POST['nome'])."',
									'".utf8_decode($_POST['descricao'])."',
									".$_POST['preco'].",
									'".$_POST['desconto']."',
									'".$_POST['idCategoria']."',
									'1',
									".$_SESSION['idUsuario'].",
									".$_POST['qtdMinEstoque']."
								)"
					)
		){
			$msg = "Produto gravado com sucesso";
		}
		else{
			$erro = "Erro ao gravar o Produto";
		}
	endif;

	// if(isset($_POST['btnNovoProduto'])){
		$q = odbc_exec($db, 'SELECT
								idProduto,
								nomeProduto,
								descProduto,
								precProduto,
								ativoProduto,
								idUsuario,
								qtdMinEstoque,
								descontoPromocao,
								imagem
								FROM
									Produto');
		$i = 0;
		while($r = odbc_fetch_array($q)){
			$produtos[$i] = $r;
			$i++;
		}

		include('lista_produtos_tpl.php');
	// }
}

?>
