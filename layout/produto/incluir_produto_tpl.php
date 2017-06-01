<?php
    include('../menu/index.head.tpl.php');
    include('../menu/index.pagint.tpl.php');
?>
<div class="col-md-9">
    <div class="box-novo-produto center-block pd-full-20 br-4">
        <form class="form-page-white"  method="post" action="../produto/" enctype='multipart/form-data'>
            <h1>Novo Produto</h1>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="email" name="descricao" placeholder="Descrição do produto"></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Preço" name="preco">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Desconto" name="desconto">
            </div>
            <select class="form-group form-control" name="idCategoria">
                <option>Categoria</option>
                <?php foreach($categorias as $categoria) : ?>
                    <option value="<?=$categoria['idCategoria']?>">
                        <?=$categoria['nomeCategoria']?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="form-group">
                <input class="form-control" type="text" name="qtdMinEstoque" placeholder="Quantidade Mínima do estoque">
            </div>
            <div class="form-group">
                <label class="file-novo-produto" for="file">Escolha o arquivo</label>
                <input id="file" type="file" name="imagem" class="prevImg">
            </div>
            <div class="form-group text-center">
                <label>Imagem do produto</label>
            </div>
            <div class="caixa-imgproduto">
                <img src="" id="preview" class="img-responsive" />
            </div>
            <div class="form-group text-center mg-tb-40">
                <button class="btn btn-default btn-produto-salvar bg-green" type="submit" name="btnNovoProduto">
                    Salvar Produto
                </button>
            </div>
        </form>
    </div>
</div>
<?php
include('../menu/index.footer.tpl.php');
?>
<script>
$(".prevImg").change(function(e){
    var _this = document.getElementsByClassName("prevImg")[0];
    var fReader = new FileReader();

    fReader.readAsDataURL(_this.files[0]);

    fReader.onloadend = function(event){
        var img = document.getElementById("preview");
        img.src = event.target.result;
    }
});
</script>
