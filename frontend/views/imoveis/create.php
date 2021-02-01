<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Imoveis */

$this->title = 'Create Imoveis';
$this->params['breadcrumbs'][] = ['label' => 'Imoveis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imoveis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
