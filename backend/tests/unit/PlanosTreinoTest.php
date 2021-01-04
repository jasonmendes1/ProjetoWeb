<?php namespace backend\tests;

use app\models\PlanosTreino;

class PlanosTreinoTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testValidation()
    {
        $planostreino = new PlanosTreino();
        
        $planostreino->nome_exercicio = null;
        $this->assertFalse($planostreino->validate(['nome_exercicio']));
        $planostreino->nome_exercicio = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($planostreino->validate(['nome_exercicio']));
        $planostreino->nome_exercicio = 'Treino';
        $this->assertTrue($planostreino->validate(['nome_exercicio']));

        $planostreino->repeticoes = 'Texto';
        $this->assertFalse($planostreino->validate(['repeticoes']));
        $planostreino->repeticoes = '1';
        $this->assertTrue($planostreino->validate(['repeticoes']));

        $planostreino->tempo = '60';
        $this->assertFalse($planostreino->validate(['tempo']));
        $planostreino->tempo = 'Texto';
        $this->assertFalse($planostreino->validate(['tempo']));
        $planostreino->tempo = '00:01:00';
        $this->assertTrue($planostreino->validate(['tempo']));

        $planostreino->serie = null;
        $this->assertFalse($planostreino->validate(['serie']));
        $planostreino->serie = 'Texto';
        $this->assertFalse($planostreino->validate(['serie']));
        $planostreino->serie = '1';
        $this->assertTrue($planostreino->validate(['serie']));

        $planostreino->repouso = null;
        $this->assertFalse($planostreino->validate(['repouso']));
        $planostreino->repouso = 'Texto';
        $this->assertFalse($planostreino->validate(['repouso']));
        $planostreino->repouso = '00:01:00';
        $this->assertTrue($planostreino->validate(['repouso']));

        $planostreino->tempo_total = null;
        $this->assertFalse($planostreino->validate(['tempo_total']));
        $planostreino->tempo_total = 'Texto';
        $this->assertFalse($planostreino->validate(['tempo_total']));  
        $planostreino->tempo_total = '00:01:00';
        $this->assertTrue($planostreino->validate(['tempo_total']));  

        $planostreino->num_maquina = null;
        $this->assertTrue($planostreino->validate(['num_maquina']));
        $planostreino->num_maquina = 'Texto';
        $this->assertFalse($planostreino->validate(['num_maquina']));   
        $planostreino->num_maquina = '27';
        $this->assertTrue($planostreino->validate(['num_maquina'])); 
    }

    function testSavingUser()
    {

        $planostreino = new PlanosTreino();
        $planostreino->nome_exercicio = 'Treino';
        $planostreino->repeticoes = '1';
        $planostreino->tempo = '00:01:00';
        $planostreino->serie = '1';
        $planostreino->repouso = '00:01:00';
        $planostreino->tempo_total = '00:01:00';
        $planostreino->num_maquina = '27';

        $planostreino->save();
        $this->tester->seeInDatabase('planos_treino', ['nome_exercicio' => 'Treino']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\PlanosTreino', ['nome_exercicio' => 'Treino']);

        $planostreino = PlanosTreino::findOne($id);
        $planostreino->primeiroNome = ('TreinoTeste');
        $planostreino->save();

        $this->tester->seeRecord('common\models\PlanosTreino', ['nome_exercicio' => 'TreinoTeste']);
        $this->tester->dontSeeRecord('common\models\PlanosTreino', ['nome_exercicio' => 'Treino']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\PlanosTreino', ['nome_exercicio' => 'TreinoTeste']);

        $planostreino = PlanosTreino::findOne($id);
        $planostreino->delete();

        $this->tester->dontSeeRecord('common\models\PlanosTreino', ['nome_exercicio' => 'TreinoTeste']);
    }
}