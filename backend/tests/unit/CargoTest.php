<?php namespace backend\tests;

use common\models\Cargo;


class CargoTest extends \Codeception\Test\Unit
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

    // tests
    public function testValidation()
    {
        $cargo = new Cargo();
        
        $cargo->cargo = null;
        $this->assertFalse($cargo->validate(['cargo']));
        $cargo->cargo = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($cargo->validate(['cargo']));
        $cargo->cargo = 'Treinador';
        $this->assertTrue($cargo->validate(['cargo']));
    }

    function testSavingUser()
    {

        $cargo = new Cargo();
        $cargo->nome_exercicio = 'Treinador';

        $cargo->save();
        $this->tester->seeInDatabase('cargo', ['cargo' => 'Treinador']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Cargo', ['cargo' => 'Treinador']);

        $cargo = Cargo::findOne($id);
        $cargo->cargo = ('TreinadorTeste');
        $cargo->save();

        $this->tester->seeRecord('common\models\Cargo', ['cargo' => 'TreinadorTeste']);
        $this->tester->dontSeeRecord('common\models\Cargo', ['cargo' => 'Treinador']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Cargo', ['cargo' => 'TreinadorTeste']);

        $cargo = Cargo::findOne($id);
        $cargo->delete();

        $this->tester->dontSeeRecord('common\models\Cargo', ['nome_exercicio' => 'TreinadorTeste']);
    }
}