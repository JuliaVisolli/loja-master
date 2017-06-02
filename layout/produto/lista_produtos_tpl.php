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
<div class="col-md-9">
	<div class="pd-full-10">
		<ul class="list-inline list-produtos">
			<div class="box-btn-novo-produto">
				<a class="btn-novo-produto" href="?acao=incluir">
					+ Novo Produto
				</a>
			</div>
			<?=isset($_GET['textoBusca'])
				? '<h4 class="tit-busca">Listando Produtos com o nome: <strong>'.$_GET['textoBusca'].'</strong></h4>'
				: ''?>
			<?php
			if(isset($produtos) && is_array($produtos)) :
				$i = 0;
				foreach($produtos as $produto){ ?>
							<div class='col-md-4'>
								<div class='box-produto'>
									<li class='item'>
										<div class='box-produto-img'>
											<img class="img-responsive img-produto" src="data:image/jpeg;base64,<?=base64_encode($produto['imagem'])?>"/>
										</div>
										<div class='box-produto-descricao'>
											<p>
												<?php if(isset($produto['idProduto'])) : ?>
													<strong>ID Produto: </strong>
													<?=$produto['idProduto']?></br>
												<?php endif; ?>

												<?php if(isset($produto['nomeProduto'])) : ?>
													<strong>Produto: </strong>
													<?= utf8_encode($produto['nomeProduto'])?>
													<?=$produto['nomeProduto']?></br>
												<?php endif; ?>


												<?php if(isset($produto['descProduto'])) : ?>
													<div class="box-toggle">
														<div class="tgl">
															<?= utf8_encode($produto['descProduto'])?>
															<?=$produto['descProduto']?></br>
														</div>
													</div>
												<?php endif; ?>

												<?php if(isset($produto['precProduto'])) : ?>
													<strong>Preço: </strong>
													<?=$produto['precProduto']?></br>
												<?php endif; ?>

												<?php if(isset($produto['descontoPromocao'])) : ?>
													<strong>Desconto: </strong>
													<?=$produto['descontoPromocao']?></br>
												<?php endif; ?>

												<?php if(isset($produto['idCategoria'])) : ?>
													<strong>Categoria: </strong>
													<?=$produto['idCategoria']?></br>
												<?php endif; ?>

												<?php if(isset($produto['ativoProduto'])) : ?>
													<strong>Ativo: </strong>
													<?=$produto['ativoProduto']?></br>
												<?php endif; ?>

												<?php if(isset($produto['idUsuario'])) : ?>
													<strong>Usuário: </strong>
													<?=$produto['idUsuario']?></br>
												<?php endif; ?>

												<?php if(isset($produto['qtdMinEstoque'])) : ?>
													<strong>Quantidade MinEstoque: </strong>
													<?=$produto['qtdMinEstoque']?>
												<?php endif; ?>
											</p>

											<a class='btn-editar' href='?acao=editar&id=<?=$produto['idProduto']?>'>
												Editar
											</a>
											<a class='btn-excluir' href='?acao=excluir&id=<?=$produto['idProduto']?>'>
												Excluir
											</a>
										</div>
									</li>
								</div>
							</div>
				<?php
					$i++;
					if($i%3 == 0)
						echo '<div class="clearfix mb-40"></div>';
				}
			?>
		<?php else : ?>
			<p class="text-center">Nenhum produto encontrado.</p>
		<?php endif;?>
		</ul>
	</div>
</div>
<?php
include('../menu/index.footer.tpl.php');
?>
