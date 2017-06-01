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
    <div class="box-editar-produto center-block pd-full-20 br-4">
        <form class="form-page-white"  method="post" action="../produto/?acao=editar&id=<?=$produto['idProduto']?>">
            <h1>Alterar dados do Produto</h1>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome do produto" value="<?=$produto['nomeProduto']?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" placeholder="Descrição do produto" name="descricao"><?=$produto['descProduto']?></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Preço" name="preco" value="<?=$produto['precProduto']?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Preço" name="estoque" value="<?=$produto['qtdMinEstoque']?>">
            </div>
            <select class="form-group form-control" name="idCategoria">
                <?php foreach($categorias as $categoria) : ?>
                    <option value="<?=$categoria['idCategoria']?>" <?=$categoria['idCategoria'] == $produto['idCategoria'] ? 'selected' : '' ?>>
                        <?=$categoria['nomeCategoria'];?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="form-group">
                <label class="file-novo-produto" for="file">Escolha o arquivo</label>
                <input id="file" type="file" name="imagem" class="prevImg">
            </div>
            <div class="form-group text-center">
                <label>Imagem do produto</label>
            </div>
            <div class="caixa-imgproduto">
            <?php if(isset($produto['imagem']) && !empty($produto['imagem'])) : ?>
                <img class="img-responsive" src="data:image/jpeg;base64,<?=base64_encode( $produto['imagem'] )?>" id="preview" class="img-responsive" />
            <?php else : ?>
                <img src="" id="preview" class="img-responsive" />
            <?php endif; ?>
            </div>
            <div class="form-group text-center mg-tb-40">
                <button class="btn btn-default btn-produto-salvar bg-green" type="submit" name="btnGravarProduto">
                    Salvar
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
