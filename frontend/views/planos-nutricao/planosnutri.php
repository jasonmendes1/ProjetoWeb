<?php
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
    <div class="headerplanostreinonutri">
        <div id="segunda" class="semanabtn" onclick="chgcolor('segunda')">
            <div class="dia">
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
    <div class="bodynutri">
    </div>
</div>


            <div class="bodytreinobody">
                <div class="bodytreinoitem">
                    <div class="itemtitle">
                        Nome Exercício
                    </div>
                    <div class="itembody">
                        <div class="item">
                            Teste
                        </div>
                        <div class="item">
                            Teste1
                        </div>
                    </div>
                </div>
                <div class="bodytreinoitem">
                    <div class="itemtitle">
                        Reps  
                    </div>
                    <div class="itembody">
                        
                    </div>
                </div>
                <div class="bodytreinoitem">
                    <div class="itemtitle">
                        Tempo
                    </div>
                    <div class="itembody">
                        
                    </div>
                </div>
                <div class="bodytreinoitem">
                    <div class="itemtitle">
                        Nº Séries
                    </div>
                    <div class="itembody">
                        
                    </div>
                </div>
                <div class="bodytreinoitem">
                    <div class="itemtitle">
                        Feito
                    </div>
                    <div class="itembody">
                        
                    </div>
                </div>
            </div>
            