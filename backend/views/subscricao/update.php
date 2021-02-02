<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subscricao */

$this->title = 'Update Subscricao: ' . $model->IDSubscricao;
$this->params['breadcrumbs'][] = ['label' => 'Subscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDSubscricao, 'url' => ['view', 'id' => $model->IDSubscricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
