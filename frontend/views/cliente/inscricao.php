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
            <div class = "tituloincricaotitulo"><H1>Incrição/Subscrição</H1></div>
            <div class = "tituloincricaobotao"><button><?= Html::a('<- Voltar ao Perfil',['profile'],['class' => 'nohover'])?></button></div>
        </div>
    </div>
    <div class = "profilebody">
        <div class = "info">
            <div class="infohead">
                <div><b><?=$cliente->primeiroNome . " " . $cliente->apelido?></b></div>
                <?php $sub = Subscricao::find()->where(['id_cliente' => $cliente->IDCliente])->one();
                    if($sub != null){ ?>
                        <div><b>Data de expiração da subscrição: </b><?=$sub->data_expirar?></div>
                    <?php }
                ?>
            </div>
            <div class = "infobody">
                <h4><b>Subscrição:</b></h4>
                <?php
                    if($sub != null){ ?>
                        <div class = "infobodyitem"><b>Tipo de Subscricao: </b><?php
                            $tipo = TipoSubscricao::find()->where(['IDTipoSubscricao' => $sub->id_tipo])->one(); 
                            echo " " . $tipo->tipo . " / " . $tipo->valor . "€";
                        ?>
                        </div>
                        <div class = "infobodyitem"><b>Desconto: </b><?php 
                        $descon = Desconto::find()->where(['IDDesconto' => $sub->id_desconto])->one(); 
                        echo $descon->nome . " / " . $descon->quantidade * 100 . "%";?>
                        </div>
                        <div class = "infobodyitem"><b>Data Subscrição/Renovação: </b><?= $sub->data_subscricao?></div>
                        <div class = "infobodyitem"><b>Expira: </b><?= $sub->data_expirar?></div>
                        <div class = "infobodyitem"><b>Montante do Ultimo Pagamento: </b><?=$sub->total?>€</div>
                    <?php }else{?>
                        <div class = "infobodyitem"><b>Não tem subscrição feita</b></div>
                    <?php }
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
                                    <b>Tipo de Subscrição: </b><?= Html::activeDropDownList($model, 'id_tipo', $tipossub)?>
                                </div>
                                <div class = "opitem">
                                    <b>Desconto: </b><?= Html::activeDropDownList($model, 'id_desconto', $descontos)?>
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
                                    <div class = "itemconta"><b>Preço Base: </b><?=$precobase?>€ </div>
                                    <div class = "itemconta"><b>Número Meses: </b><?=$multi?></div>
                                    <div class = "itemconta"><b>Desconto: </b><?=$desconto?>%</div>
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