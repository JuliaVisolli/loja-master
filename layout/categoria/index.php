<?php
include('../../db/index.php');
include('../../auth/controle_de_acesso.php');

if(isset($_REQUEST['acao'])){
	$acao = $_REQUEST['acao'];

	switch($acao){
		case 'incluir':
			include('incluir_categoria_tpl.php');
			break;

		case 'excluir':
			if(is_numeric($_GET['id'])){
				if($q = odbc_exec($db, " DELETE FROM
										Categoria
									WHERE
										idCategoria = {$_GET['id']}")){
					if(odbc_num_rows($q) > 0){
						$msg = "Categoria exclu&iacute;da com sucesso";
					}else{
						$erro = "Categoria n&atilde;o existe";
					}
				}else{
					$erro = "Erro ao excluir a Categoria";
				}
			}else{
				$erro = "ID inv&aacute;lido";
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

			include('lista_categoria_tpl.php');

			break;

		case 'editar':

			$idCategoria = is_numeric($_REQUEST['id']) ? $_REQUEST['id'] : 'NULL';

			if(isset($_POST['btnGravarCategoria'])){;

				//trata nome
				$nome = $_POST['nomeCategoria'];

				if(odbc_exec($db, " UPDATE
										Categoria
									SET
										nomeCategoria = '$nome'
									WHERE
										idCategoria = $idCategoria")){
					$msg = "Categoria gravada com sucesso";
				}else{
					$erro = "Erro ao gravar o Categoria";
				}
			}

			$query_categoria
				= odbc_exec($db, 'SELECT
									idCategoria,
									nomeCategoria
								FROM
									Categoria
								WHERE
									idCategoria = '.$idCategoria);
			$categoria
				= odbc_fetch_array($query_categoria);

			include('editar_categoria_tpl.php');

			break;

		default:
			$erro = "A&ccedil;&atilde;o inv&aacute;lida";
	}

}else{

	//insere nova categoria
	if(isset($_POST['btnNovaCategoria'])){

		if(odbc_exec($db, "INSERT INTO Categoria
								(nomeCategoria)
								VALUES ('" . $_POST['nomeCategoria'] . "')")){
			$msg = "Categoria gravada com sucesso";
		}else{
			$erro = "Erro ao gravar a Categoria";
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

	include('lista_categoria_tpl.php');
}











?>
