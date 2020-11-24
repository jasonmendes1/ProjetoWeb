<?php

use yii\helpers\Html;
use yii\models\Cliente;

    $this->title = 'Perfil '. $cliente->primeiroNome . " " . $cliente->apelido;

?>
<div class="main">
    <div class="profileheader">
        <div>
            <img src="<?=$cliente->avatar?>" align="left" style="border-radius:10000px; width: 100px; height: 100px; ">
        </div>
        <div>
            <h2 style="color: black"><?=$cliente->primeiroNome . " " . $cliente->apelido ?></h2>
            <h5><b><?= "@" . $user->username ?></b></h5>
        </div>
        
    </div>
    
</div>
