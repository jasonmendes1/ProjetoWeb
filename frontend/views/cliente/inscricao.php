<?php

use frontend\models\Desconto;
use frontend\models\Subscricao;
use frontend\models\TipoSubscricao;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Inscrição';
?>

<div class = "main">
    <div class = "header">
        <div class="tituloincricao">
            <H1>Incrição</H1>
        </div>
    </div>
    <div class = "profilebody">
        <div class = "info">
            <div class="infohead">
                <div><?=$cliente->primeiroNome . " " . $cliente->apelido?></div>
                <?php $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
                    if($sub != null){ ?>
                        <div>Data de expiração da subscrição: <?=$sub->data_expirar?></div>
                    <?php }
                ?>
            </div>
            <div class = "infobody">
                Subscrição:
                <?php
                    if($sub != null){ ?>
                        <div class = "infobodyitem">Tipo de Subscricao: <?php
                            $tipo = TipoSubscricao::find()->where(['IDTipoSubscricao' => $sub->id_tipo])->one(); 
                            echo $tipo->tipo . " / " . $tipo->valor . "€";
                         ?>
                        </div>
                        <div class = "infobodyitem">Desconto: <?php 
                        $descon = Desconto::find()->where(['IDDesconto' => $sub->id_desconto])->one(); 
                        echo $descon->nome . " / " . $descon->quantidade * 100 . "%";?>
                        </div>
                        <div class = "infobodyitem">Data Subscrição/Renovação: <?= $sub->data_subscricao?></div>
                        <div class = "infobodyitem">Expira: <?= $sub->data_expirar?></div>
                        <div class = "infobodyitem">Montante do Ultimo Pagamento: <?=$sub->total?>€</div>
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
            <?php
                if(isset($option)){
                    if($option == 1){?>
                        <div class = "opbody">
                            <?php $form = ActiveForm::begin();?>
                                <div class = "opitem">
                                    Tipo de Subscrição: <?= Html::activeDropDownList($model, 'id_tipo', $tipossub)?>
                                </div>
                                <div class = "opitem">
                                    Desconto: <?= Html::activeDropDownList($model, 'id_desconto', $descontos)?>
                                </div>
                                <div class = "opitem">
                                    <?= $form->field($model, 'meses') ?>
                                </div>
                        </div>
                        <div class = "buttons">
                            <?= Html::submitButton('Calcular Total') ?>
                        </div>
                        <?php ActiveForm::end();?>
                    <?php }elseif($option == 2){ ?>
                        <div class = "opbody">
                            <?php $form = ActiveForm::begin();?>
                                <div class = "opitem">
                                    <?= $form->field($model, 'meses') ?>
                                </div>
                            </div>
                        <div class = "buttons">
                            <?= Html::submitButton('Calcular Total') ?>
                        </div>
                        <?php ActiveForm::end();?>
                    <?php }?>
                    
                <?php }
            ?>
        </div>
        <div class = "conta">
            <?php
                if(isset($precobase)){?>
                    <div class = "pagarconta">
                        <div class = "itemsconta">
                            <?php
                                if(isset($precobase)){?>
                                    <div class = "itemconta">Preço Base: <?=$precobase?>€ </div>
                                    <div class = "itemconta">Número Meses: <?=$multi?></div>
                                    <div class = "itemconta">Desconto: <?=$desconto?>%</div>
                                    <div class = "itemconta">--------------------------</div>
                                    <div class = "itemconta"></div>
                                <?php }else{ ?>

                                <?php }
                            ?>
                            
                        </div>
                        <div class = "total">
                            <div><h3>Total: <?=$total?>€</h3></div>
                        </div>
                        </div>
                        <div class = "buttons">
                            <button type="button"><?= Html::a('Pagar Subscrição',['pagarsubs','iddesconto' => $model->id_desconto,'idtipo' => $model->id_tipo,'meses' => $model->meses,'total' => $total,'op' => $option],['class' => 'nohover'])?></button>
                        </div>
                    </div>  
                <?php }
            ?>
    </div>
</div>