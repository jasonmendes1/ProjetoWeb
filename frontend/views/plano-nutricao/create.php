<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoNutricao */

$this->title = 'Create Plano Nutricao';
$this->params['breadcrumbs'][] = ['label' => 'Plano Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plano-nutricao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
