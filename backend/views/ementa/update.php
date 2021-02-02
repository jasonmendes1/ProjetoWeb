<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ementa */

$this->title = 'Update Ementa: ' . $model->IDEmenta;
$this->params['breadcrumbs'][] = ['label' => 'Ementas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDEmenta, 'url' => ['view', 'id' => $model->IDEmenta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ementa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
