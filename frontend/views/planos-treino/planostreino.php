<?php

use yii\bootstrap\Html;

$this->title = 'Planos de Treino';
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
            <?php foreach($semanas as $smn){?>
                <div>
                    <?= Html::a($smn.'º Semana', ['selectsemana', 'semana' => $smn]) ?>
                </div>
            <?php };?>
        </div>
        <div class="bodytreino">
            <div class="bodytreinoheader">
                <div id="segunda" class="semanabtn" onclick="chgcolor('segunda')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 1);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Segunda-Feira', ['selectdia', 'semana' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                        ?>
                    </div>
                </div>
                <div id="terca" class="semanabtn" onclick="chgcolor('terca')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 2);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Terça-Feira', ['selectdia', 'semana' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                            ?>
                        </div>
                </div>
                <div id="quarta" class="semanabtn" onclick="chgcolor('quarta')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 3);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Quarta-Feira', ['selectdia', 'semana' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                            ?>
                        </div>
                </div>
                <div id="quinta" class="semanabtn" onclick="chgcolor('quinta')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 4);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Quinta-Feira', ['selectdia', 'semana' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                            ?>
                        </div>
                </div>
                <div id="sexta" class="semanabtn" onclick="chgcolor('sexta')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 5);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Sexta-Feira', ['selectdia', 'semana' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                            ?>
                        </div>
                </div>
                <div id="sabado" class="semanabtn" onclick="chgcolor('sabado')">
                    <div class="diasemana">
                        <?php $timestamp = mktime(0,0,0,1,1,2021) + ($selectedsemana *7*24*60*60);
                                $tsforweekday = $timestamp - 86400 * (date('N', $timestamp) - 6);
                                $data = date('Y-m-d',$tsforweekday);
                            ?>
                            <?= Html::a('Sábado', ['selectdia', 'smn' => $selectedsemana, 'dia' => $data], ['class' => 'dia', 'data-method' => 'get']) ?>
                            <?php 
                            echo $data;
                            ?>
                        </div> 
                </div>
            </div>
            <div class = "bodytreinobody">
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Nome Exercício
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->nome?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Repetições
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->repeticoes?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Tempo
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->tempo?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Séries
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->serie?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Repouso
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->repouso?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Tempo Total
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?=$exercicio->tempo_total?>
                            </div>
                        <?php };?>
                    </div>
                </div>
                <div class = "bodytreinoitem">
                    <div class = "itemtitle">
                        Número da Máquina
                    </div>
                    <div class = "itembody">
                        <?php foreach($exercicios as $exercicio){ ?>
                            <div class = "item">
                                <?php if($exercicio->num_maquina == null){
                                    $nm = "N/A";
                                }else{
                                    $nm = $exercicio->num_maquina;
                                }
                                ?>
                                <?=$nm?>
                            </div>
                        <?php };?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>