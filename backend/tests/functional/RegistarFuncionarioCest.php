<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class RegistarFuncionarioCest
{
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage(\yii::$app->homeUrl);
        $I->fillField('Username', 'jason');
        $I->fillField('Password', '12345678');
        $I->click('login-button');
        $I->see('Congratulations!');
        
        $I->click('Registar Funcionário');
        // Inserção de Dados
        $I->fillField('Username', 'userbackend');
        $I->fillField('Email', 'userbackend@userbackend.com');
        $I->fillField('Password', 'passwordbackend');
        $I->attachFile('#signupform-avatar', 'backend.png');
        $I->fillField('Primeiro Nome', 'BackendTeste');
        $I->fillField('Apelido', 'BackendTeste');
        $I->fillField('Dt Nascimento', '1990-01-01');

        $option = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option);

        $I->fillField('Num Tele', '912345678');
        $I->fillField('Nif', '123456789');

        $I->click('signup-button');

    }
}
