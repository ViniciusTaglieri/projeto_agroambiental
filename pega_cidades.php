<?php 
    require_once ("classes/conexao.php");
    require_once ("classes/cidade.php");

    $objeto = new cidade();
    $lista = $objeto->selecionarCidades();
    foreach($lista as $cidades){
        if($cidades->id == 8534){
            echo '<option selected value="'.$cidades->id.'">'.$cidades->nome.'</option>';
        }else{
            echo '<option value="'.$cidades->id.'">'.$cidades->nome.'</option>';
        }
    }
?>