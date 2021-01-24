<?php

    $this->title = 'Perfil '. $cliente->primeiroNome . " " . $cliente->apelido;

    if($pt != null){
        $ptavatar = $pt->avatar;
        $ptnome = $pt->primeiroNome . "" . $pt->apelido;
        $ptnasci = $pt->dt_nascimento;
        $ptsexo = $pt->sexo;
        $ptnumtele = $pt->num_tele;
        $ptemail = $pt->user->email;
    }else{
        $ptavatar = "";
        $ptnome = "";
        $ptnasci = "";
        $ptsexo = "";
        $ptnumtele = "";
        $ptemail = "";
    }

    if($nutri != null){
        $nutriavatar = $nutri->avatar;
        $nutrinome = $nutri->primeiroNome . "" . $nutri->apelido;
        $nutrinasci = $nutri->dt_nascimento;
        $nutrisexo = $nutri->sexo;
        $nutrinumtele = $nutri->num_tele;
        $nutriemail = $nutri->user->email;
    }else{
        $nutriavatar = "";
        $nutrinome = "";
        $nutrinasci = "";
        $nutrisexo = "";
        $nutrinumtele = "";
        $nutriemail = "";
    }

    if($cliente->altura != null && $cliente->peso != null){
        $altquad = $cliente->altura * $cliente->altura;
        $IMC = round((($cliente->peso / $altquad)*10000),2);
    
        if($IMC < 18.5){
            $cls = "Abaixo do Peso";
            $style = "padding-left:15px; color:#FAE40D";
        }else if($IMC >= 18.5 && $IMC < 25){
            $cls = "Peso Normal";
            $style = "padding-left:15px; color:#72FE26";
        }else if($IMC >= 25 && $IMC < 30){
            $cls = "Sobrepeso";
            $style = "padding-left:15px; color:#FAAB0D";
        }else if($IMC >= 30 && $IMC < 35){
            $cls = "Obesidade grau 1";
            $style = "padding-left:15px; color:#FA8A0D";
        }else if($IMC >= 35 && $IMC < 40){
            $cls = "Obesidade grau 2";
            $style = "padding-left:15px; color:#FA5F0D";
        }else if($IMC >= 40){
            $cls = "Obesidade grau 3";
            $style = "padding-left:15px; color:#F0130C";
        }    
    }else{
        $cls = "IMC não calculado";
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
            <button type="button" onclick="alert('Inscrição Atualizada')">
                Atualizar Inscrição
            </button>
            <button type="button" onclick="alert('Pedido de Personal Trainer enviado')">
                Pedir Personal Trainer
            </button>
            <button type="button" onclick="alert('Pedido de Nutricionista enviado')">
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
                        IMC: <?=$IMC?> Kg/m²
                    </div>
                    <div class="IMCclass">
                        <div>
                            Classificação:
                        </div>
                        <div style="<?=$style?>">
                            <?=$cls?>
                        </div>
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
                        <img class="funcavatar" src="<?=$ptavatar?>" >
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
                        <img class="funcavatar" src="<?=$nutriavatar?>">
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

