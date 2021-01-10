<?php

use yii\helpers\Html;
use yii\grid\GridView;



$this->title = 'Horários';
$this->params['breadcrumbs'][] = $this->title;
?>


<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
  ));
  
  ?>