<?php
include('../menu/index.head.tpl.php');
include('../menu/index.pagint.tpl.php');
if(isset($erro)){
	echo "<center><font color='red'>
			$erro
			</font></center>";
}
if(isset($msg)){
	echo "<center><font color='red'>
			$msg
			</font></center>";
}
?>

<!-- <form method="post" action="../categoria/"><br><br>
	Nome da Categoria: <input type="text" name="nomeCategoria"><br><br>
	Descrição da Categoria: <input type="text" name="descCategoria"><br><br>
	<input type="submit" value="Gravar" name="btnNovoProduto">
</form> -->
<div class="col-md-9">
    <?php include_once "./incluir_categoria_tpl.php"; ?>
    <div class="box-lista-categoria">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
			<table cellpadding="0" cellspacing="0" border="0" align=center width="700" style="width: 700px;">
				<tr>
					<td class="tit-lista-usuario">Categoria</td>
				</tr>
				<?php foreach($categorias as $categoria) : ?>
				<tr>
					<td>
						<?=$categoria['nomeCategoria'] ?>
					</td>
					<td>
						<a class='btn-editar btn-editar-categoria' href='?acao=editar&id=<?=$categoria['idCategoria']?>'>
							Editar
						</a>
					</td>
					<td>
						<a class='btn-excluir btn-excluir-categoria' href='?acao=excluir&id=<?=$categoria['idCategoria']?>'>
							Excluir
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</table>
	</div>
</div>
<?php
include('../menu/index.footer.tpl.php');
?>
