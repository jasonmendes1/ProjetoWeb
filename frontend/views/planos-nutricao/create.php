<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Planosnutricao */

$this->title = 'Create Planosnutricao';
$this->params['breadcrumbs'][] = ['label' => 'Planosnutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planosnutricao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
