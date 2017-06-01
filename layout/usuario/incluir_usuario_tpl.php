<?php
include('../menu/index.head.tpl.php');
include('../menu/index.pagint.tpl.php');
?>
 <div class="col-md-9">
    <div class="box-novo-usuario center-block pd-full-20 br-4">
        <form class="form-page-white"  method="post" action="../usuario/">
            <h1>Novo Usuário</h1>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="login" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Senha" name="senha">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirmação de senha" name="confsenha">
            </div>
            <select class="form-group form-control" name="perfil">
                <option value="C">Cliente</option>
                <option value="A">Administrador</option>
            </select>
                <label class="checkbox-ativo">Ativo:
                     <input class="check-user-ativo" type="checkbox" name="ativo">
                </label>
            <div class="form-group text-center mg-tb-40">
                <button class="btn btn-default btn-produto-salvar bg-green" type="submit" name="btnNovoUsuario">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<?php
include('../menu/index.footer.tpl.php');
?>
