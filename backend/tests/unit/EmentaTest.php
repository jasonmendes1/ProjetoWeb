<?php namespace backend\tests;

use common\models\Ementa;

class EmentaTest extends \Codeception\Test\Unit
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
        $ementa = new Ementa();

        $ementa->PequenoAlmoco = null;
        $this->assertTrue($ementa->validate(['PequenoAlmoco']));
        $ementa->nomeEmenta = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertTrue($ementa->validate(['nomeEmenta']));
        $ementa->nomeEmenta = 'Perda de Peso';
        $this->assertTrue($ementa->validate(['nomeEmenta']));

        $ementa->PequenoAlmoco = null;
        $this->assertTrue($ementa->validate(['PequenoAlmoco']));
        $ementa->PequenoAlmoco = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($ementa->validate(['PequenoAlmoco']));
        $ementa->PequenoAlmoco = 'PequenoAlmoco';
        $this->assertTrue($ementa->validate(['PequenoAlmoco']));

        $ementa->Almoco = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($ementa->validate(['Almoco']));
        $ementa->Almoco = 'Almoco';
        $this->assertTrue($ementa->validate(['Almoco']));

        $ementa->Lanche1 = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($ementa->validate(['Lanche1']));
        $ementa->Lanche1 = 'Lanche1';
        $this->assertTrue($ementa->validate(['Lanche1']));

        $ementa->Lanche2 = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($ementa->validate(['Lanche2']));
        $ementa->Lanche2 = 'Lanche2';
        $this->assertTrue($ementa->validate(['Lanche2']));

        $ementa->Jantar = 'fghnvghtoolooooongndsdsadsadsadsadsadsadsadsazdsfsdfdsgfdgsgsbrsgbsbgsfersgsfdgsdsadsadsadsdsadsadsadsadsadasfbfasefebsabfasbfabdsfsfbebaesbfasefbasebfaesfbaesfesbfaesfbasdsadasdadasdsadasafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($ementa->validate(['Jantar']));
        $ementa->Jantar = 'Jantar';
        $this->assertTrue($ementa->validate(['Jantar']));
        
    }

    function testSavingUser()
    {

        $ementa = new Ementa();
        $ementa->nomeEmenta = 'Perda de Peso';
        $ementa->PequenoAlmoco = 'PequenoAlmoco';
        $ementa->Almoco = 'Almoco';
        $ementa->Lanche1 = 'Lanche1';
        $ementa->Lanche2 = 'Lanche2';
        $ementa->Jantar = 'Jantar';

        $ementa->save();
        $this->tester->seeInDatabase('ementa', ['PequenoAlmoco' => 'PequenoAlmoco']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Ementa', ['PequenoAlmoco' => 'PequenoAlmoco']);

        $ementa = Ementa::findOne($id);
        $ementa->PequenoAlmoco = ('PequenoAlmocoTeste');
        $ementa->save();

        $this->tester->seeRecord('common\models\Ementa', ['PequenoAlmoco' => 'PequenoAlmocoTeste']);
        $this->tester->dontSeeRecord('common\models\Ementa', ['PequenoAlmoco' => 'PequenoAlmoco']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Ementa', ['PequenoAlmoco' => 'PequenoAlmocoTeste']);

        $ementa = Ementa::findOne($id);
        $ementa->delete();

        $this->tester->dontSeeRecord('common\models\Ementa', ['PequenoAlmoco' => 'PequenoAlmocoTeste']);
    }

}