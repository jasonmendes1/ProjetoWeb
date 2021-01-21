<?php

use yii\helpers\Html;

$this->title = 'Perfil ';
?>

<div class="main">
    <div class = "header">
        <div class = "profile-avater">
            <img src="<?=$func->avatar?>" align="left" style="border-radius: 10000px; width:100px; height:100px;">
        </div>
        <div class = "profile-info">
            <div class= "profile-grid-teste">
                <div class="header-info">
                    <h4><b><?=$func->primeiroNome . " " . $func->apelido?></b></h4>
                </div>
                <div class="header-info">
                    <h4>Sexo: <?=$func->sexo?></h4>
                </div>
            </div>
            <div class= "profile-grid-teste">
                <div class="header-info">
                    <h4>Data Nascimento: <?=$func->dt_nascimento?></h4>
                </div>
                <div class="header-info">
                    <h4>Email: <?=$user->email?></h4>
                </div>
            </div>
            <div class= "profile-grid-teste">
                <div class="header-info">
                    <h4>Cargo: <?=$cargo?></h4>
                </div>
                <div class="header-info">
                    <h4>Num Telemóvel: <?=$func->num_tele?></h4>
                </div>
            </div>
        </div>
    </div>
    <div class= "profilebodyfunc">
        <div class = "profilebody-clientes">
            <?php foreach($clientes as $cliente){ ?>
                <div>
                    <?= Html::a($cliente->primeiroNome . ' ' . $cliente->apelido, ['selectcliente', 'cliente' => $cliente], ['class' => 'btnsemanas']) ?>
                </div>
            <?php }; ?>
        </div>
        <div class = "profilebody-planos">
            <?php foreach($planos as $plano){ ?>
                <div>
                    <?= Html::a($plano->IDPlanoTreino, ['selectplano', 'plano' => $plano], ['class' => 'btnsemanas']) ?>
                </div>
            <?php };?>
        </div>
        <div class = "profilebody-exers">
            <?php
            ?>
            Quando clicar num planos de treino mostrará os exercicios do plano
        </div>
    </div>
</div>