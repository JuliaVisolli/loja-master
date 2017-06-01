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

<div class="col-md-9">
    <div class="box-editar-usuario center-block pd-full-20 br-4">
        <form class="form-page-white"  method="post" action="../usuario/?acao=editar&id=<?=$usuario['idUsuario']?>">
            <h1>Editar dados do Usuário</h1>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?=$usuario['nomeUsuario']?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="login" placeholder="E-mail" value="<?=$usuario['loginUsuario']?>" />
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Senha" name="senha">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirmação de senha" name="confsenha">
            </div>
            <select class="form-group form-control" name="perfil">
                <option value="C" <?=$usuario['tipoPerfil'] == 'C' ? 'selected' : ''?>>Cliente</option>
                <option value="A" <?=$usuario['tipoPerfil'] == 'A' ? 'selected' : ''?>>Administrador</option>
            </select>
                <label class="checkbox-ativo">Ativo:
                     <input class="check-user-ativo" type="checkbox" name="ativo" <?=$usuario['usuarioAtivo'] ? 'checked' : ''?>>
                </label>
            <div class="form-group text-center mg-tb-40">
                <button class="btn btn-default btn-produto-salvar bg-green" type="submit" name="btnGravarUsuario">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include('../menu/index.footer.tpl.php');
?>
