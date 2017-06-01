<?php
include('../menu/index.head.tpl.php');
include('../menu/index.pagint.tpl.php');

if(isset($erro)){
	echo "<center><font color='red'>
			$erro
			</font></center>";
}
if(isset($msg)){
	echo "<center><font color='green'>
			$msg
			</font></center>";
}
?>
<!--
<form method="post" action="../categoria/"><br><br>
	Nome da Categoria: <input type="text" name="nome"
	value="<?php echo $array_categoria['nomeCategoria']; ?>"><br><br>
	Descrição da Categoria: <input type="text" name="nome"
	value="<?php echo $array_produto['descCategoria']; ?>"><br><br>
	<input type="submit" value="Gravar" name="btnGravarCategoria">
</form> -->
<div class="col-md-9">
    <div class="box-editar-categoria center-block pd-full-20 br-4">
        <form class="form-page-white" method="post" action="../categoria/?acao=editar&id=<?=$categoria['idCategoria']; ?>">
            <h1>Editar Categoria</h1>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Categoria" name="nomeCategoria" value="<?=$categoria['nomeCategoria']; ?>">
            </div>
            <div class="form-group text-center mg-tb-40">
                <button class="btn btn-default btn-produto-salvar bg-green" type="submit" value="Gravar" name="btnGravarCategoria">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include('../menu/index.footer.tpl.php');
?>
