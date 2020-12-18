<?php

use yii\helpers\Html;
use yii\models\Cliente;

    $this->title = 'Perfil '. $cliente->primeiroNome . " " . $cliente->apelido;

    if($pt != null){
        $ptavatar = $pt->avatar;
        $ptnome = $pt->primeiroNome;
        $ptnasci = $pt->dt_nascimento;
        $ptsexo = $pt->sexo;
        $ptnumtele = $pt->num_tele;
        $ptemail = $pt->email;
    }else{
        $ptavatar = "";
        $ptnome = "";
        $ptnasci = "";
        $ptsexo = "";
        $ptnumtele = "";
        $ptemail = "";
    }

    if($nutri != null){
        $nutriavatar = $pt->avatar;
        $nutrinome = $nutri->primeiroNome;
        $nutrinasci = $nutri->dt_nascimento;
        $nutrisexo = $nutri->sexo;
        $nutrinumtele = $nutri->num_tele;
        $nutriemail = $nutri->email;
    }else{
        $nutriavatar = "";
        $nutrinome = "";
        $nutrinasci = "";
        $nutrisexo = "";
        $nutrinumtele = "";
        $nutriemail = "";
    }
     
    

?>
<div class="main">
    <div class="header">
        <div class="profile-avatar">
            <img src="<?=$cliente->avatar?>" align="left" style="border-radius: 10000px; width:100px; height:100px;">
        </div>
        <div class="profile-info">
            <div class="profile-grid-teste">
                <div class="header-info">
                    <h4><b><?=$cliente->primeiroNome . " " . $cliente->apelido ?></b></h4>
                </div>
                <div class="header-info">
                    <h4>Sexo: <?=$cliente->sexo?></h4>
                </div>  
            </div>
            <div class="profile-grid-teste">
                <div class="header-info">
                    <h4>Data Nascimento: <?=$cliente->dt_nascimento?></h4>
                </div>
                <div class="header-info">
                    <h4>Email: <?=$user->email?></h4>
                </div>
            </div>
            <div class="profile-grid-teste">
                <div class="header-info">
                    <h4>Subscrição:</h4>
                </div>
                <div class="header-info" style="padding-left:75px;">
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
                    <?=$cliente->altura?> cm
                </div>
            </div>    
            <div class="info-panel">
                <div class="title">
                    <b>Peso:</b>
                </div>
                <div class="bodyinfo">
                    <?=$cliente->peso?> Kg
                </div>
            </div>      
            <div class="info-panel">
                <div class="title">
                    <b>Massa Muscular:</b>
                </div>
                <div class="bodyinfo">
                    <?=$cliente->massa_muscular?> %
                </div>
            </div>
            <div class="info-panel">
                <div class="title">
                    <b>Massa Gorda:</b>
                </div>
                <div class="bodyinfo">
                    <?=$cliente->massa_gorda?> %
                </div>
            </div>
            <div class="info-panel">
                <div class="title">
                    <b>Índice de Massa Corporal:</b>
                </div>
                <div class="bodyinfo">
                    <div>
                        IMC: Kg/m²
                    </div>
                    <div>
                        Classificação:
                    </div>
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
                                Nome: <?=$ptnome?>
                            </div>
                            <div>
                                Idade: <?=$ptnasci?>
                            </div>
                            <div>
                                Sexo: <?=$ptsexo?>
                            </div>
                            <div>
                                Num Telemovel: <?=$ptnumtele?>
                            </div>
                            <div>
                                Email: <?=$ptemail?>
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
                                Nome: <?=$nutrinome?>
                            </div>
                            <div>
                                Idade: <?=$nutrinasci?>
                            </div>
                            <div>
                                Sexo: <?=$nutrisexo?>
                            </div>
                            <div>
                                Num Telemovel: <?=$nutrinumtele?>
                            </div>
                            <div>
                                Email: <?=$nutriemail?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

