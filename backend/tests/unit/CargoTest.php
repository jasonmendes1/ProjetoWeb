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
        $cargo->cargo = ('Personal Trainer');

        $cargo->save();
        $this->tester->seeInDatabase('cargo', ['cargo' => 'Personal Trainer']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Cargo', ['cargo' => 'Personal Trainer']);

        $cargo = Cargo::findOne($id);
        $cargo->cargo = ('Personal TrainerTeste');
        $cargo->save();

        $this->tester->seeRecord('common\models\Cargo', ['cargo' => 'Personal TrainerTeste']);
        $this->tester->dontSeeRecord('common\models\Cargo', ['cargo' => 'Personal Trainer']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Cargo', ['cargo' => 'Personal TrainerTeste']);

        $cargo = Cargo::findOne($id);
        $cargo->delete();

        $this->tester->dontSeeRecord('common\models\Cargo', ['cargo' => 'Personal TrainerTeste']);
    }
   
}