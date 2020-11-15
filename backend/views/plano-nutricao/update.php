<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoNutricao */

$this->title = 'Update Plano Nutricao: ' . $model->IDPlanoNutricao;
$this->params['breadcrumbs'][] = ['label' => 'Plano Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPlanoNutricao, 'url' => ['view', 'id' => $model->IDPlanoNutricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plano-nutricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
