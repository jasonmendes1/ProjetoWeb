<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    body{
        background-image: url("https://images5.alphacoders.com/692/692038.jpg");
        background-repeat: no-repeat, repeat;
        background-size: cover;
        overflow-y: scroll;
    }
</style>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

</div>
