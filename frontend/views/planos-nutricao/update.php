<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Planosnutricao */

$this->title = 'Update Planosnutricao: ' . $model->IDPlanoNutricao;
$this->params['breadcrumbs'][] = ['label' => 'Planosnutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDPlanoNutricao, 'url' => ['view', 'id' => $model->IDPlanoNutricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planosnutricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
