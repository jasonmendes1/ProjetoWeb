<?php

    /* @var $this yii\web\View */


$this->title = 'Fitness League';
?>
<style>
    body{
        background-image: url("https://images4.alphacoders.com/692/692043.jpg");
        background-color: #0a0a0a;
        background-repeat:no-repeat;
        background-size: cover;
        overflow-y: scroll;
    }
    .jumbotron{
        color: #fafafa;
    }
</style>
<body>
<div class="site-index">

    <div class="jumbotron">
        <h1>Fitness League</h1>
        <p>O seu ginásio tecnológico!</p>
    </div>

</div>
<?php
    $images=['<img src="../images/1.jpg" alt="1"/>','<img src="../images/2.jpg" alt="2"/>','<img src="../images/3.jpg" alt="3"/>'];
    echo yii\bootstrap\Carousel::widget(['items'=>$images]);
?>
</body>



