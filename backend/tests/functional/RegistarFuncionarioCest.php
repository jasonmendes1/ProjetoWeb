<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class RegistarFuncionarioCest
{
    public function tryToTest(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->fillField('Username', 'jason');
        $I->fillField('Password', '123123123');
        $I->see('Remember Me');
        $I->click('login-button');
        //$I->see('Bem vindo');
        
        $I->click('Menu Administrativo');
        $I->click('Registar Funcionário');

        // Inserção de Dados
        $I->see('Username');
        $I->fillField('Username', 'funcionariotrainer');
        $I->fillField('Email', 'funcionariotrainer@nutricionario.com');
        $I->fillField('Password', 'funcionariotrainer');
        $I->fillField('Primeiro Nome', 'Funcionario');
        $I->fillField('Apelido', 'Personal Trainer');
        $I->fillField('Dt Nascimento', '1990-01-01');

        $option = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option);

        $I->fillField('Num Tele', '912345678');

        $option = $I->grabTextFrom('select option:nth-child(1)');
        $I->selectOption("select", $option);

        $I->see('signup-button');
        $I->click('signup-button');
        $I->see('Thank you for registration.');

    }
}
