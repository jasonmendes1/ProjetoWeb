<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class RegistarFuncionarioCest
{
    public function tryToTest(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->fillField('Username', 'userteste2');
        $I->fillField('Password', 'passwordteste');
        $I->see('Remember Me');
        $I->click('login-button');
        $I->see('Congratulations!');
        
        $I->click('Registar Funcionário');
        // Inserção de Dados
        $I->fillField('Username', 'funcionarionutricionista');
        $I->fillField('Email', 'funcionario@nutricionario.com');
        $I->fillField('Password', 'funcionarionutricionista');
        $I->fillField('Primeiro Nome', 'Funcionario');
        $I->fillField('Apelido', 'Nutricionista');
        $I->fillField('Dt Nascimento', '1990-01-01');

        $option = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option);

        $I->fillField('Num Tele', '912345678');

        $option = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option);

        $I->click('signup-button');

    }
}
