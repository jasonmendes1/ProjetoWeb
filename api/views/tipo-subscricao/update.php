<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoSubscricao */

$this->title = 'Update Tipo Subscricao: ' . $model->IDTipoSubscricao;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Subscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IDTipoSubscricao, 'url' => ['view', 'id' => $model->IDTipoSubscricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-subscricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
