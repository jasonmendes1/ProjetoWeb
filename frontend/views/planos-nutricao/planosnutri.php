<?php
    $this->title = 'Planos de Treino';

    use yii\bootstrap\Html;
?>
<script>
    function chgcolor($id){
        if($id == "segunda"){
            document.getElementById("segunda").style.backgroundColor = "#4d4d4d";
            document.getElementById("terca").style.backgroundColor = "grey";
            document.getElementById("quarta").style.backgroundColor = "grey";
            document.getElementById("quinta").style.backgroundColor = "grey";
            document.getElementById("sexta").style.backgroundColor = "grey";
            document.getElementById("sabado").style.backgroundColor = "grey";
        }
        if($id == "terca"){
            document.getElementById("segunda").style.backgroundColor = "grey";
            document.getElementById("terca").style.backgroundColor = "#4d4d4d";
            document.getElementById("quarta").style.backgroundColor = "grey";
            document.getElementById("quinta").style.backgroundColor = "grey";
            document.getElementById("sexta").style.backgroundColor = "grey";
            document.getElementById("sabado").style.backgroundColor = "grey";
        }
        if($id == "quarta"){
            document.getElementById("segunda").style.backgroundColor = "grey";
            document.getElementById("terca").style.backgroundColor = "grey";
            document.getElementById("quarta").style.backgroundColor = "#4d4d4d";
            document.getElementById("quinta").style.backgroundColor = "grey";
            document.getElementById("sexta").style.backgroundColor = "grey";
            document.getElementById("sabado").style.backgroundColor = "grey";
        
        }
        if($id == "quinta"){
            document.getElementById("segunda").style.backgroundColor = "grey";
            document.getElementById("terca").style.backgroundColor = "grey";
            document.getElementById("quarta").style.backgroundColor = "grey";
            document.getElementById("quinta").style.backgroundColor = "#4d4d4d";
            document.getElementById("sexta").style.backgroundColor = "grey";
            document.getElementById("sabado").style.backgroundColor = "grey";
        
        }
        if($id == "sexta"){
            document.getElementById("segunda").style.backgroundColor = "grey";
            document.getElementById("terca").style.backgroundColor = "grey";
            document.getElementById("quarta").style.backgroundColor = "grey";
            document.getElementById("quinta").style.backgroundColor = "grey";
            document.getElementById("sexta").style.backgroundColor = "#4d4d4d";
            document.getElementById("sabado").style.backgroundColor = "grey";
        
        }
        if($id == "sabado"){
            document.getElementById("segunda").style.backgroundColor = "grey";
            document.getElementById("terca").style.backgroundColor = "grey";
            document.getElementById("quarta").style.backgroundColor = "grey";
            document.getElementById("quinta").style.backgroundColor = "grey";
            document.getElementById("sexta").style.backgroundColor = "grey";
            document.getElementById("sabado").style.backgroundColor = "#4d4d4d";
        }
    }
</script>
<div class="main">
    <div class="planostreinobody">
        <div class="headerplanostreinonutri">
            <?php foreach($semanas as $smn){ ?>
                <div>
                    <?= Html::a($smn.'º Semana', ['selectsemana', 'semana' => $smn], ['class' => 'btnsemanas']) ?>
                </div>
            <?php };?>
        </div>
        <div class="bodytreino">
            <div class="bodytreinoheader">
                <div id="segunda" class="semanabtn" onclick="chgcolor('segunda')">
                    <div class = "diasemana">
                        <?php
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 1);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                
                                $data = date('Y-m-d',strtotime('monday this week'));
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Segunda-Feira', ['selectdia', 'semana' => $semana, 'diasemana' => 'Segunda'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div>
                </div>
                <div id="terca" class="semanabtn" onclick="chgcolor('terca')">
                    <div class="diasemana">
                        <?php 
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 2);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                $data = date('Y-m-d',strtotime('Tuesday this week'));
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Terça-Feira', ['selectdia', 'semana' => $semana, 'diasemana' => 'Terca'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div>
                </div>
                <div id="quarta" class="semanabtn" onclick="chgcolor('quarta')">
                    <div class="diasemana">
                        <?php 
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 3);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                $data = date('Y-m-d',strtotime('wednesday this week'));
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Quarta-Feira', ['selectdia', 'semana' => $semana, 'diasemana' => 'Quarta'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div>
                </div>
                <div id="quinta" class="semanabtn" onclick="chgcolor('quinta')">
                    <div class="diasemana">
                        <?php 
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 4);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                $data = date('Y-m-d',strtotime('thursday this week'));;
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Quinta-Feira', ['selectdia', 'semana' => $semana, 'diasemana' => 'Quinta'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div>
                </div>
                <div id="sexta" class="semanabtn" onclick="chgcolor('sexta')">
                    <div class="diasemana">
                        <?php 
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 5);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                $data = date('Y-m-d',strtotime('friday this week'));
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Sexta-Feira', ['selectdia', 'semana' => $semana, 'diasemana' => 'Sexta'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div>
                </div>
                <div id="sabado" class="semanabtn" onclick="chgcolor('sabado')">
                    <div class="diasemana">
                        <?php 
                            if($selectedsemana != null){
                                $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 6);
                                $data = date('Y-m-d',$tsforweekday);
                                $semana = $selectedsemana;
                            }else{
                                $data = date('Y-m-d',strtotime('saturday this week'));
                                $semana = -1;
                            }
                        ?>
                        <?= Html::a('Sábado', ['selectdia', 'semana' => $semana, 'diasemana' => 'Sabado'], ['class' => 'btnsemanas']) ?>
                        <?=$data?>
                    </div> 
                </div>
            </div>
            <div class = "bodynutribody">
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Pequeno Almoço
                    </div>
                    <div class="bodynutriitembody">
                        <?php
                            if(count($ementas) >= 1){
                                echo $ementas[0]->PequenoAlmoco;
                            }
                        ?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Almoço
                    </div>
                    <div class="bodynutriitembody">
                        <?php
                            if(count($ementas) >= 1){
                                echo $ementas[0]->Almoco;
                            }
                        ?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        1º Lanche
                    </div>
                    <div class="bodynutriitembody">
                        <?php
                            if(count($ementas) >= 1){
                                echo $ementas[0]->Lanche1;
                            }
                        ?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        2º Lanche 
                    </div>
                    <div class="bodynutriitembody">
                        <?php
                            if(count($ementas) >= 1){
                                echo $ementas[0]->Lanche2;
                            }
                        ?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Jantar
                    </div>
                    <div class="bodynutriitembody">
                        <?php
                            if(count($ementas) >= 1){
                                echo $ementas[0]->Jantar;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>