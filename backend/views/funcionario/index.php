<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FuncionarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionários';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3>Personal Trainers:</h3>
    <?php foreach ($funcProvider as $func)
    {?>
        <?php if($func->cargo_id == 1) {?>
        <div>
            <p><?='Nome: ', $func->primeiroNome,' ', $func->apelido, ' | Data de Nascimento: ', $func->dt_nascimento, ' | Sexo: ', $func->sexo , ' | Nr Telemóvel: ', $func->num_tele  ?></p>
        </div>
        <?php } ?>
    <?php } ?>
    <h3>Nutricionistas:</h3>
    <?php foreach ($funcProvider as $func)
    {?>
        <?php if($func->cargo_id == 2) {?>

        <p><?='Nome: ', $func->primeiroNome,' ', $func->apelido, ' | Data de Nascimento: ', $func->dt_nascimento, ' | Sexo: ', $func->sexo , ' | Nr Telemóvel: ', $func->num_tele  ?></p>

        <?php } ?>
    <?php } ?>
</div>
