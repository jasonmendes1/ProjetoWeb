<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Inscrição';
?>

<div class = "main">
    <div class = "header">
        <div>
            Incrição
        </div>
    </div>
    <div class = "profilebody">
        <div class = "info">
            <div class="infohead">
                <?=$cliente->primeiroNome . " " . $cliente->apelido?>
            </div>
            <div class = "infobody">
                Subscrição:
                <?php
                    if($sub != null){ ?>
                        Data Subscrição/Renovação: <?= $sub->data_expirar?>
                        Expira: <?= $sub->data_expirar?>
                    <?php }else{
                        echo "Não tem Subscrição feita";
                    }
                ?>
            </div>
            <div class = "buttons">
                <?php
                    if($sub != null){ ?>
                        <button type="button"><?= Html::a('Renovar Subscrição',['renovarsubscricao'],['class' => 'nohover'])?></button>
                        <button type="button"><?= Html::a('Eliminar Subscrição',['eliminiarsubscricao'],['class' => 'nohover'])?></button>
                    <?php }else{ ?>
                        <button type="button"><?= Html::a('Criar Subscrição',['criarsubscricao'],['class' => 'nohover'])?></button>
                        <button type="button"><?= Html::a('Eliminar Subscrição',['eliminiarsubscricao'],['class' => 'nohoverr'])?></button>
                    <?php }
                ?>
                
            </div>
        </div>
        <div class = "options">
            <div class = "opbody">
                <?php
                    if($sub != null){?>
                        Tipo de Subscrição: <?=$sub->id_tipo?>
                        Desconto: <?=$sub->id_desconto?>
                    <?php }else{?>
                        <div class = "opitem">
                            Tipo de Subscrição: <select name="tiposub"><?php
                                foreach($tipossub as $tipo){?>
                                    <option value=<?=$tipo->IDTipoSubscricao?>><?=$tipo->tipo?></option>
                                <?php }
                            ?></select>
                        </div>
                        <div class = "opitem">
                            Desconto: <select name="desconto"><?php
                                foreach($descontos as $desc){?>
                                    <option value=<?=$desc->IDDesconto?>><?=$desc->nome?></option>
                                <?php }
                            ?></select>
                        </div>
                        <div class = "opitem">
                            Meses : <input name="meses">
                        </div>
                <?php }
                ?>
            </div>
            <div class = "buttons">
                <button type="button"><?= Html::a('Calcular Subscrição',['tipo' => $_POST['tiposub'],'desconto' => $_POST['desconto'],'meses' => $_POST['meses']],['class' => 'nohover'])?></button>
            </div>
        </div>
        <div class = "conta">
            <div></div>
            <div class = "pagarconta">
                <div class = "itemsconta">
                    <div class = "itemconta">Preço Base: </div>
                    <div class = "itemconta">Desconto: </div>
                </div>
                <div class = "total">
                    <div><h3>Total:</h3></div>
                </div>
            </div>
            <div class = "buttons">
                <button type="button"><?= Html::a('Pagar Subscrição',['pagar'],['class' => 'nohover'])?></button>
            </div>
        </div>  
    </div>
</div>