<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendário de Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php
        Modal::begin([
            'header'=>'<h4>Aulas</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    
    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'options' => [
            'lang' => 'pt'
        ],
      'events'=> $events,
  ));
?>
