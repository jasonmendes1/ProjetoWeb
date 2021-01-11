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
            <?php foreach($planostreino as $pt){?>
                <div>
                    <?= Html::a($pt->semana.'º Semana', ['teste', 'album' => '1'], ['data-method' => 'get']) ?>
                    <?=$pt->semana?>º Semana
                </div>
            <?php };?>
        </div>
        <div class="bodytreino">
            <div class="bodytreinoheader">
                <div id="segunda" class="semanabtn" onclick="chgcolor('segunda')">
                    <div class="dia">
                        <?= Html::a('Segunda-Feira', ['teste', 'album' => '1'], ['class' => 'btn btn-default', 'data-method' => 'get']) ?>
                        Segunda-Feira
                    </div>
                </div>
                <div id="terca" class="semanabtn" onclick="chgcolor('terca')">
                    <div class="dia">
                        Terça-Feira
                    </div>
                </div>
                <div id="quarta" class="semanabtn" onclick="chgcolor('quarta')">
                    <div class="dia">
                        Quarta-Feira
                    </div>
                </div>
                <div id="quinta" class="semanabtn" onclick="chgcolor('quinta')">
                    <div class="dia">
                        Quinta-Feira
                    </div>
                </div>
                <div id="sexta" class="semanabtn" onclick="chgcolor('sexta')">
                    <div class="dia">
                        Sexta-Feira
                    </div>
                </div>
                <div id="sabado" class="semanabtn" onclick="chgcolor('sabado')">
                    <div class="dia">
                        Sábado
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