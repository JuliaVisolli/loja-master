<header class="header-index">
	<div class="col-md-3">
		<div class="img-logo">
			<a href="http://localhost/loja-master/layout/menu/">
				<img class="img-responsive" src="../../img/logo/LogoFoxtrot.png">
			</a>
		</div>
	</div>
	<div class="col-md-6">
		<div class="pesquisa">
			<p>Bem-vindo a FoxTrot</p>
			<div class="input-group box-pesquisa">
				<form action="../produto">
					<input type="hidden" name="acao" value="buscar" />
					<input type="text" class="form-control inline-block" name="textoBusca" placeholder="Buscar produto" <?=isset($_GET['textoBusca']) ? 'value="'.$_GET['textoBusca'].'"' : ''?>>
					<button class="input-group-addon" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="login">
			<div class="col-md-6">
				<div class="row">
					<a href="#">
						<div class="box-orange">
							<i class="fa fa-list" aria-hidden="true"></i>
						</div>
						<p>Meus Pedidos</p>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="box-minha-conta">
						<div class="box-orange">
							<i class="fa fa-user icon-user" aria-hidden="true"></i>
						</div>
						<p class="tit-minha-conta">Minha Conta</p>
						<ul class="list-minha-conta">
							<a href="../logout"><li>Sair</li></a>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="box-carrinho">
						<a class="bloco-carrinho" href="#">
							<div class="box-orange">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</div>
							<p>Meu Carrinho</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
