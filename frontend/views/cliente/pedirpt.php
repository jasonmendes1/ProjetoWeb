<?php

use common\models\User;
use frontend\models\ClienteFuncionarios;
use frontend\models\Planosnutricao;
use frontend\models\PlanosTreino;
use yii\bootstrap\Html;

$this->title = "Pedir Personal Trainer";
?>

<div class = "main">
    <div class = "pedirbody">
        <div class = "funcbody">
            <?php
                foreach($pts as $pt){?>
                    <div class = "func">
                        <div class = "func-header"><img src="<?=$pt->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;"></div>
                        <div class = "func-body">
                            <div class = "func-body-up">
                                <div><b>ID: </b><?= Html::a($pt->IDFuncionario,['verpts','id' => $pt->IDFuncionario],['class' => 'nohover'])?></div>
                                <div><b>Nome: </b><?=$pt->primeiroNome . " " . $pt->apelido?></div>
                                <div><b>Data Nascimento: </b><?= $pt->dt_nascimento?></div>
                                <div><b>Email: </b><?php $data = User::find()->where(['id' => $pt->User_id])->one(); echo $data->email;?></div>
                            </div>
                            <div class = "func-body-down">
                                <div><b>Sexo: </b><?= $pt->sexo?></div>
                                <div><b>Num Telemovel: </b><?=$pt->num_tele?></div>
                                <div><b>Num Clientes: </b><?php $num = count(ClienteFuncionarios::find()->where(['id_PT' => $pt->IDFuncionario])->all()); echo $num;?></div>
                            </div>
                        </div>
                    </div>
               <?php }
            ?>
        </div>
        <div class = "cliente_func">
            <?php
                if(isset($personal)){?>
                    <div class = "cliente-func-header">
                        <img src="<?=$personal->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;">
                    </div>
                    <div class = "cliente-func-body">
                            <div class = "cliente-func-body-item"><h4><b>ID: </b><?= $personal->IDFuncionario?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Nome: </b><?= $personal->primeiroNome . " " . $personal->apelido?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Data Nascimento: </b><?= $personal->dt_nascimento?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Email: </b><?php echo User::find()->where(['id' => $personal->User_id])->one()->email;?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Sexo: </b><?= $personal->sexo?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Telemovel: </b><?= $personal->num_tele?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Clientes: </b><?php echo count(ClienteFuncionarios::find()->where(['id_PT' => $personal->IDFuncionario])->all());?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Planos de Treino Criados: </b><?php echo count(PlanosTreino::find()->where(['id_PT' => $personal->IDFuncionario])->all()); ?></h4></div>
                    </div>
                    <div class = "cliente-func-buttons">
                            <button onclick="alert('Nutricionista Atribuido')"><?= Html::a('Atribuir Nutricionista',['atribuirpt','id' => $personal->IDFuncionario],['class' => 'nohover'])?></button>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>

