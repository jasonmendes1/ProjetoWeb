<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricao */

$this->title = 'Update Planos Nutricao: ' . $model->IDPlanoNutricao;
$this->params['breadcrumbs'][] = ['label' => 'Planos Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPlanoNutricao, 'url' => ['view', 'id' => $model->IDPlanoNutricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planos-nutricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
