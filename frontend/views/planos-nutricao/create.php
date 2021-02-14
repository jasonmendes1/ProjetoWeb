<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PlanosNutricao */


$this->title = 'Criar Planos Nutricão';
$this->params['breadcrumbs'][] = ['label' => 'Planos Nutricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planos-nutricao-create">

    <?php if(isset($clienteselect)){?>
        <?= $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
        'clienteselect' => $clienteselect,
        'planos' => $planos,
    ]) ?>
    <?php }else{?>
        <?= $this->render('_form', [
        'model' => $model,
        'clientes' => $clientes,
    ]) ?>
    <?php }
    ?>
    

</div>
