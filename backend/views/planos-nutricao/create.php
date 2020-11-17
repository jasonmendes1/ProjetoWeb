<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanosNutricao */

$this->title = 'Create Planos Nutricao';
$this->params['breadcrumbs'][] = ['label' => 'Planos Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planos-nutricao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
