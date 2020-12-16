<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Desconto */

$this->title = 'Update Desconto: ' . $model->IDDesconto;
$this->params['breadcrumbs'][] = ['label' => 'Descontos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDDesconto, 'url' => ['view', 'id' => $model->IDDesconto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="desconto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
