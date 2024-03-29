<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PlanoNutricao */

$this->title = $model->IDPlanoNutricao;
$this->params['breadcrumbs'][] = ['label' => 'Plano Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plano-nutricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDPlanoNutricao], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDPlanoNutricao], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'IDPlanoNutricao',
            'Segunda',
            'Terca',
            'Quarta',
            'Quinta',
            'Sexta',
            'Sabado',
            'IDNutricionista',
        ],
    ]) ?>

</div>
