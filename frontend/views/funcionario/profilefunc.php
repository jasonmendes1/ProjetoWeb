<?php

use common\models\User;
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
            <div class = "profilebody-title"><b>Clientes</b></div>
            <?php foreach($clientes as $cliente){ ?>
                <div class = "cliente">
                    <div class = "cliente-header">
                        <img src="<?=$cliente->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;">
                    </div>
                    <div class = "cliente-body">
                        <div class = "cliente-body-up">
                            <div><?= Html::a($cliente->primeiroNome . " " . $cliente->apelido, ['selectcliente', 'cliente' => $cliente->IDCliente], ['class' => 'btnsemanas']) ?></div>
                            <div><b>Data Nascimento : </b><?=$cliente->dt_nascimento?></div>
                        </div>
                        <div class = "cliente-body-down">
                        <div><b>Sexo: </b><?=$cliente->sexo?></div>
                            <div><b>Email: </b><?php
                                $userr = User::find()->where(['id' => $cliente->User_id])->one();
                                echo $userr->email;
                            ?></div>
                            <div><b>Nº Telemóvel: </b><?=$cliente->num_tele?></div>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <div class = "profilebody-planos">
            <div class = "profilebody-title"><b>Planos Treino</b></div>
            <?php foreach($planos as $plano){ ?>
                <div class = "planos">
                    <div><b>ID: </b><?= Html::a($plano->IDPlanoTreino, ['selectplano', 'plano' => $plano->IDPlanoTreino,'cliente' => $selected->IDCliente], ['class' => 'btnsemanas']) ?></div>
                    <div style="padding-left:15px"><b>Dia Treino: </b> <?=$plano->dia_treino?></div>
                </div>
            <?php };?>
        </div>
        <div class = "profilebody-exers">
            <div class = "profilebody-title"><b>Exercícios</b></div>
            <?php foreach($exercicios as $exercicio){?>
                <div class = "exercicios">
                    <div class="exercicios-up">
                        <div><b>ID: </b><?=$exercicio->IDExer?></div>
                        <div><b>Nome: </b><?=$exercicio->nome?></div>
                        <div><b>Repetições: </b><?=$exercicio->repeticoes?></div>
                        <div><b>Tempo: </b><?=$exercicio->tempo?> <b> seg</b></div>
                    </div>
                    <div class = "exercicios-down">
                        <div><b>Serie: </b><?=$exercicio->serie?></div>
                        <div><b>Repouso: </b><?=$exercicio->repouso?><b> seg</b></div>
                        <div><b>Tempo Total: </b><?=$exercicio->tempo_total?><b> seg</b></div>
                        <div><b>Nº Maquina: </b><?=$exercicio->num_maquina?></div>
                    </div>
                    
                </div>
            <?php };?>
        </div>
    </div>
</div>