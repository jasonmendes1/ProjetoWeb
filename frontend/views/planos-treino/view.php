<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosTreino */

$this->title = $model->IDPlanoTreino;
$this->params['breadcrumbs'][] = ['label' => 'Planos Treinos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="planos-treino-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->IDPlanoTreino], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IDPlanoTreino], [
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
            'IDPlanoTreino',
            'nome_exercicio',
            'repeticoes',
            'tempo',
            'serie',
            'repouso',
            'tempo_total',
            'num_maquina',
            'id_PT',
        ],
    ]) ?>

</div>
