<?php namespace frontend\tests;

use frontend\models\PlanosNutricao;

class PlanosNutricaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testCreatePlanosNutricao()
    {
        $planonutricao = new PlanosNutricao();

        $planonutricao->Segunda = 1;
        $planonutricao->Terca = 1;
        $planonutricao->Quarta = 1;
        $planonutricao->Quinta = 1;
        $planonutricao->Sexta = 1;
        $planonutricao->Sabado = 1;

        $planonutricao->IDNutricionista = 1;

        $planonutricao->save();

        //$this->tester->seeInDatabase('planonutricao',['IDPlanoNutricao' => '1']);
    }
}