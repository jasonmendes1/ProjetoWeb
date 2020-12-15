<?php

use yii\helpers\Html;
use yii\models\Cliente;

    $this->title = 'Perfil '. $cliente->primeiroNome . " " . $cliente->apelido;

?>
<div class="main">
    <div class="header">
        <div class="profile-avatar">
            <img src="<?=$cliente->avatar?>" align="left" style="border-radius: 10000px; width:100px; height:100px;">
        </div>
        <div class="profile-info">
            <div class="profile-grid">
                <div>
                    <h4><b><?=$cliente->primeiroNome . " " . $cliente->apelido ?></b></h4>
                </div>
                <div>
                    <h4>Data Nascimento: <?=$cliente->dt_nascimento?></h4>
                </div>
                <div>
                    <h4>Subscrição:</h4>
                </div>
            </div>
            <div class="profile-grid">
                <div>
                    <h4>Sexo: <?=$cliente->sexo?></h4>
                </div>
                <div>
                    <h4>Email: <?=$user->email?></h4>
                </div>
                <div style="padding-left: 25px">
                    <h6>Feita a:</h6>
                    <h6>Expira a:</h6>
                </div>
            </div>
        </div>
        <div class="profile-btn">
            <button>
                Atualizar Inscrição
            </button>
            <button>
                Pedir Personal Trainer
            </button>
            <button>
                Pedir Nutricionista
            </button>
        </div>
    </div>
    <div class="profilebody">
        <div class="profile-body-info">
            <div class="info-panel">
                <div class="title">
                    <b>Altura:</b>
                </div>
                <div class="bodyinfo">
                    Mostrar a Altura
                </div>
            </div>    
            <div class="info-panel">
                <div class="title">
                    <b>Peso:</b>
                </div>
                <div class="bodyinfo">
                    Mostrar o Peso
                </div>
            </div>      
            <div class="info-panel">
                <div class="title">
                    <b>Massa Muscular:</b>
                </div>
                <div class="bodyinfo">
                    Mostrar a Massa Muscular
                </div>
            </div>
            <div class="info-panel">
                <div class="title">
                    <b>Massa Muscular:</b>
                </div>
                <div class="bodyinfo">
                    Mostrar a Massa Gorda
                </div>
            </div>
            <div class="info-panel">
                <div class="title">
                    <b>Índice de Massa Corporal:</b>
                </div>
            </div>
        </div>
        <div class="other-info">
            <div class="Funci">
                <div class="title">
                    <b>Personal Trainer</b>
                </div>
                <div class="Funcinfo">
                    <div class="Funciavatar">
                        <"Foto do Personal Trainer">
                    </div>
                    <div class="Funcinfobody">
                        <div class="fbody">
                            <div>
                                Nome:
                            </div>
                            <div>
                                Idade:
                            </div>
                            <div>
                                Sexo:
                            </div>
                            <div>
                                Num Telemovel:
                            </div>
                            <div>
                                Email:
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Funci">
                <div class="title">
                    <b>Nutricionista</b>
                </div>
                <div class="Funcinfo">
                    <div class="Funciavatar">
                        <"Foto do Nutricionista">
                    </div>
                    <div class="Funcinfobody">
                        <div class="fbody">
                            <div>
                                Nome:
                            </div>
                            <div>
                                Idade:
                            </div>
                            <div>
                                Sexo:
                            </div>
                            <div>
                                Num Telemovel:
                            </div>
                            <div>
                                Email:
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

