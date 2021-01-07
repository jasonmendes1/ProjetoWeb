<?php namespace backend\tests;

use common\models\Planotreino;

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
        $planotreino = new Planotreino();
        
        $planotreino->nome_exercicio = null;
        $this->assertFalse($planotreino->validate(['nome_exercicio']));
        $planotreino->nome_exercicio = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($planotreino->validate(['nome_exercicio']));
        $planotreino->nome_exercicio = 'Treino';
        $this->assertTrue($planotreino->validate(['nome_exercicio']));

        $planotreino->repeticoes = 'Texto';
        $this->assertFalse($planotreino->validate(['repeticoes']));
        $planotreino->repeticoes = '1';
        $this->assertTrue($planotreino->validate(['repeticoes']));

        $planotreino->tempo = '60';
        $this->assertTrue($planotreino->validate(['tempo']));
        $planotreino->tempo = 'Texto';
        $this->assertTrue($planotreino->validate(['tempo']));
        $planotreino->tempo = '00:01:00';
        $this->assertTrue($planotreino->validate(['tempo']));

        $planotreino->serie = null;
        $this->assertFalse($planotreino->validate(['serie']));
        $planotreino->serie = 'Texto';
        $this->assertFalse($planotreino->validate(['serie']));
        $planotreino->serie = '1';
        $this->assertTrue($planotreino->validate(['serie']));

        $planotreino->repouso = null;
        $this->assertFalse($planotreino->validate(['repouso']));
        $planotreino->repouso = 'Texto';
        $this->assertTrue($planotreino->validate(['repouso']));
        $planotreino->repouso = '00:01:00';
        $this->assertTrue($planotreino->validate(['repouso']));

        $planotreino->tempo_total = null;
        $this->assertFalse($planotreino->validate(['tempo_total']));
        $planotreino->tempo_total = 'Texto';
        $this->assertTrue($planotreino->validate(['tempo_total']));  
        $planotreino->tempo_total = '00:01:00';
        $this->assertTrue($planotreino->validate(['tempo_total']));  

        $planotreino->num_maquina = null;
        $this->assertTrue($planotreino->validate(['num_maquina']));
        $planotreino->num_maquina = 'Texto';
        $this->assertFalse($planotreino->validate(['num_maquina']));   
        $planotreino->num_maquina = '27';
        $this->assertTrue($planotreino->validate(['num_maquina'])); 
        
    }

    function testSavingUser()
    {
        $planotreino = new Planotreino();
        $planotreino->nome_exercicio = 'Treino';
        $planotreino->repeticoes = '1';
        $planotreino->tempo = '00:01:00';
        $planotreino->serie = '1';
        $planotreino->repouso = '00:01:00';
        $planotreino->tempo_total = '00:01:00';
        $planotreino->num_maquina = '27';

        $planotreino->save();
        $this->tester->seeInDatabase('planos_treino', ['nome_exercicio' => 'Treino']);
    }
/*
    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\PlanoTreino', ['nome_exercicio' => 'Treino']);

        $planotreino = Planotreino::findOne($id);
        $planotreino->primeiroNome = ('TreinoTeste');
        $planotreino->save();

        $this->tester->seeRecord('common\models\PlanoTreino', ['nome_exercicio' => 'TreinoTeste']);
        $this->tester->dontSeeRecord('common\models\PlanoTreino', ['nome_exercicio' => 'Treino']);
    }
    
/*
    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\PlanoTreino', ['nome_exercicio' => 'TreinoTeste']);

        $planotreino = PlanoTreino::findOne($id);
        $planotreino->delete();

        $this->tester->dontSeeRecord('common\models\PlanoTreino', ['nome_exercicio' => 'TreinoTeste']);
    }
    */
}