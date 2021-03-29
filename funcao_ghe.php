<?php
$id_ghe = $_POST['id'];

?>
<div class="form-group">
    <select class="form-control" name="id_funcao" require>
        <option value="" disabled selected>Escolha a função:</option>
        <?php
        require_once('classes/funcao_ghe.php');
        require_once('classes/funcao.php');
        $objeto = new FuncaoGhe();
        $obj_funcao = new Funcao();
        $lista = $objeto->selecionarFuncaoGheWhereGhe($id_ghe);
        foreach ($lista as $funcao_ghe) {
            $lista_funcao = $obj_funcao->selecionarFuncaoWhere($funcao_ghe->id_funcao);
            foreach ($lista_funcao as $funcao) {
        ?>
                <option value="<?= $funcao->id ?>"><?= $funcao->nome ?></option>
        <?php
            }
        }
        ?>
    </select>
</div>