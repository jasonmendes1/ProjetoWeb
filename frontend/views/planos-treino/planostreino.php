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
    <div class="planostreinobody">
        <div class="headerplanostreinonutri">
            <div>
                Teste
            </div>
            <div>
                Teste1
            </div>
        </div>
        <div class="bodytreino">
            <div class="bodytreinoheader">
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
            <table>
                <tr>
                    <th>Nome Exercício</th>
                    <th>Reps</th>
                    <th>Tempo</th>
                    <th>Nº Séries</th>
                    <th>Feito</th>
                </tr>
                <tr>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                    <td>Teste</td>
                </tr>
                <tr>
                    <td>Teste1</td>
                    <td>Teste1</td>
                    <td>Teste1</td>
                    <td>Teste1</td>
                    <td>Teste1</td>
                </tr>
                <tr>
                    <td>Teste2</td>
                    <td>Teste2</td>
                    <td>Teste2</td>
                    <td>Teste2</td>
                    <td>Teste2</td>
                </tr>
            </table>
        </div>
    </div> 
</div>