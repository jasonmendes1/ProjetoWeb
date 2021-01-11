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
            <?php foreach($planosnutricao as $pn){ ?>
                <div>
                    <?= Html::a($pn->Semana.'º Semana', ['teste', 'album' => '1'], ['class' => 'btnsemana','data-method' => 'get']) ?>
                </div>
            <?php };?>
        </div>
        <div class="bodytreino">
            <div class="bodytreinoheader">
                <div id="segunda" class="semanabtn" onclick="chgcolor('segunda')">
                    <?= Html::a('Segunda-Feira', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                </div>
                <div id="terca" class="semanabtn" onclick="chgcolor('terca')">
                    <div class="dia">
                        <?= Html::a('Terça-Feira', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                    </div>
                </div>
                <div id="quarta" class="semanabtn" onclick="chgcolor('quarta')">
                    <div class="dia">
                        <?= Html::a('Quarta-Feira', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                    </div>
                </div>
                <div id="quinta" class="semanabtn" onclick="chgcolor('quinta')">
                    <div class="dia">
                        <?= Html::a('Quinta-Feira', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                    </div>
                </div>
                <div id="sexta" class="semanabtn" onclick="chgcolor('sexta')">
                    <div class="dia">
                        <?= Html::a('Sexta-Feira', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                    </div>
                </div>
                <div id="sabado" class="semanabtn" onclick="chgcolor('sabado')">
                    <div class="dia">
                        <?= Html::a('Sábado', ['teste', 'album' => '1'], ['class' => 'dia','data-method' => 'get']) ?>
                    </div> 
                </div>
            </div>
            <div class = "bodynutribody">
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Pequeno Almoço
                    </div>
                    <div class="bodynutriitembody">
                        <?=$ementas[0]->PequenoAlmoco?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Almoço
                    </div>
                    <div class="bodynutriitembody">
                        <?=$ementas[0]->Almoco?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        1º Lanche
                    </div>
                    <div class="bodynutriitembody">
                        <?=$ementas[0]->Lanche1?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        2º Lanche 
                    </div>
                    <div class="bodynutriitembody">
                        <?=$ementas[0]->Lanche2?>
                    </div>
                </div>
                <div class="bodynutriitem">
                    <div class="bodynutriitemtitle">
                        Jantar
                    </div>
                    <div class="bodynutriitembody">
                        <?=$ementas[0]->Jantar?>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>