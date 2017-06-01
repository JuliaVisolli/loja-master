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
<div class="col-md-9 lista-usuario">
				<div class="box-btn-novo-usuario">
				<a class="btn-novo-usuario" href="?acao=incluir">
					+ Novo Usuario
				</a>
			</div>
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
<table class="list-user" cellpadding="0" cellspacing="0" border="0" align=center width="700" style="width: 700px;">
	<tr>
		<td class="tit-lista-usuario">ID Usu&aacute;rio</td>
		<td class="tit-lista-usuario">Login</td>
		<td class="tit-lista-usuario">Nome</td>
		<td class="tit-lista-usuario">Perfil</td>
		<td class="tit-lista-usuario">Ativo</td>
		<td colspan="2" align="center">
		</td>
	</tr>
	<?php
	foreach($usuarios as $usuario){
		echo "	<tr>
					<td>{$usuario['idUsuario']}</td>
					<td>{$usuario['loginUsuario']}</td>
					<td>{$usuario['nomeUsuario']}</td>
					<td>{$usuario['tipoPerfil']}</td>
					<td>{$usuario['usuarioAtivo']}</td>
					<td>
						<a class='btn-editar btn-editar-usuario' href='?acao=editar&id={$usuario['idUsuario']}'>
							Editar
						</a>					
					</td>
					<td>
						<a class='btn-excluir btn-excluir-usuario' href='?acao=excluir&id={$usuario['idUsuario']}'>
							Excluir
						</a>
					</td>
				</tr>";		
	}
	?>
</table>
</table>
</div>
<?php
include('../menu/index.footer.tpl.php');
?>