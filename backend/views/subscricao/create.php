<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subscricao */

$this->title = 'Create Subscricao';
$this->params['breadcrumbs'][] = ['label' => 'Subscricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscricao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
