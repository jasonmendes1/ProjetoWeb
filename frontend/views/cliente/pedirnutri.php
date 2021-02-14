<?php

use common\models\User;
use frontend\models\ClienteFuncionarios;
use frontend\models\Planosnutricao;
use yii\bootstrap\Html;

$this->title = "Pedir Nutricionista";
?>

<div class = "main">
    <div class = "header">
        <div class="tituloincricao">
            <div class = "tituloincricaotitulo"><H1>Atribuir Nutricionista</H1></div>
            <div class = "tituloincricaobotao"><button><?= Html::a('<- Voltar ao Perfil',['profile'],['class' => 'nohover'])?></button></div>
        </div>
    </div>
    <div class = "pedirbody">
        <div class = "funcbody">
            <?php
                foreach($nutris as $nutri){?>
                    <div class = "func">
                        <div class = "func-header"><img src="<?=$nutri->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;"></div>
                        <div class = "func-body">
                            <div class = "func-body-up">
                                <div><b>ID: </b><?= Html::a($nutri->IDFuncionario,['vernutri','id' => $nutri->IDFuncionario],['class' => 'nohover'])?></div>
                                <div><b>Nome: </b><?=$nutri->primeiroNome . " " . $nutri->apelido?></div>
                                <div><b>Data Nascimento: </b><?= $nutri->dt_nascimento?></div>
                                <div><b>Email: </b><?php $data = User::find()->where(['id' => $nutri->User_id])->one(); echo $data->email;?></div>
                            </div>
                            <div class = "func-body-down">
                                <div><b>Sexo: </b><?= $nutri->sexo?></div>
                                <div><b>Num Telemovel: </b><?=$nutri->num_tele?></div>
                                <div><b>Num Clientes: </b><?php $num = count(ClienteFuncionarios::find()->where(['id_nutricionista' => $nutri->IDFuncionario])->all()); echo $num;?></div>
                            </div>
                        </div>
                    </div>
               <?php }
            ?>
        </div>
        <div class = "cliente_func">
            <?php
                if(isset($nutricionista)){?>
                    <div class = "cliente-func-header">
                        <img src="<?=$nutricionista->avatar?>" align="left" style="border-radius: 10000px; width:50px; height:50px;">
                    </div>
                    <div class = "cliente-func-body">
                            <div class = "cliente-func-body-item"><h4><b>ID: </b><?= $nutricionista->IDFuncionario?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Nome: </b><?= $nutricionista->primeiroNome . " " . $nutricionista->apelido?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Data Nascimento: </b><?= $nutricionista->dt_nascimento?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Email: </b><?php echo User::find()->where(['id' => $nutricionista->User_id])->one()->email;?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Sexo: </b><?= $nutricionista->sexo?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Telemovel: </b><?= $nutricionista->num_tele?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Clientes: </b><?php echo count(ClienteFuncionarios::find()->where(['id_nutricionista' => $nutricionista->IDFuncionario])->all());?></h4></div>
                            <div class = "cliente-func-body-item"><h4><b>Num Planos de Nutrição Criados: </b><?php echo count(Planosnutricao::find()->where(['IDNutricionista' => $nutricionista->IDFuncionario])->all()); ?></h4></div>
                    </div>
                    <div class = "cliente-func-buttons">
                            <button onclick="alert('Nutricionista Atribuido')"><?= Html::a('Atribuir Nutricionista',['atribuirnutri','id' => $nutricionista->IDFuncionario],['class' => 'nohover'])?></button>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</div>