<?php namespace backend\tests;

use app\models\Planostreino;

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
        $planotreino = new Planostreino();
        
        $planotreino->dia_treino = null;
        $this->assertFalse($planotreino->validate(['dia_treino']));
        $planotreino->dia_treino = '2021-01-06';
        $this->assertTrue($planotreino->validate(['dia_treino']));

        $planotreino->semana = 'textoooooooootooooooooolooooooooooooooonnnnnnnnnnnnngggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggdsadsadsfdgfdsgokgfjdoifjdhgoifdjgoidsfjgoisfdjgofdjgoisfdjgoifdsjgosfdjgfsodjfhgsoijhgoifdjhoifjhfgoijhfgoijhfoijhdgoifjhdgoifjhdgoijfhdgoijhfgoifjghdfdgjohfjdgoigoifdsjgfoidsjgodsfjogi';
        $this->assertFalse($planotreino->validate(['semana']));
        $planotreino->semana = '1';
        $this->assertTrue($planotreino->validate(['semana']));
        
    }

    function testSavingUser()
    {
        $planotreino = new Planostreino();
        $planotreino->id_PT = '1';
        $planotreino->dia_treino = '2021-01-06';
        $planotreino->semana = '1';

        $planotreino->save();
        $this->tester->seeInDatabase('planostreino', ['semana' => '1']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\PlanoTreino', ['semana' => '1']);

        $planotreino = Planostreino::findOne($id);
        $planotreino->semana = ('2');
        $planotreino->save();

        $this->tester->seeRecord('common\models\PlanoTreino', ['semana' => '2']);
        $this->tester->dontSeeRecord('common\models\PlanoTreino', ['semana' => '1']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\PlanoTreino', ['semana' => '2']);

        $planotreino = Planostreino::findOne($id);
        $planotreino->delete();

        $this->tester->dontSeeRecord('common\models\PlanoTreino', ['semana' => '2']);
    }
    
}