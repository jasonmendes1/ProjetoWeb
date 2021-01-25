<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class PlanoNutricaoCest
{
    public function tryCreatePlanoNutricao(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->see('Fitness League');
        $I->click('Registar/Login');
        $I->click('Fazer Login');
        $I->fillField('Username', 'funcionarionutri');
        $I->fillField('Password', 'funcionarionutri');
        $I->fillField('Username', 'teste4');
        $I->fillField('Password', 'testeteste');
        $I->see('Remember Me');
        $I->click('login-button');
    

        $I->see('Bem Vindo');
        $I->click('Bem Vindo');
        
        $I->click('Criar Plano de Nutrição');

        

        $option1 = $I->grabTextFrom('select option:nth-child(1)');
        $I->selectOption("select", $option1);

        $option2 = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option2);

        $option3 = $I->grabTextFrom('select option:nth-child(1)');
        $I->selectOption("select", $option3);

        $option4 = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option4);

        $option5 = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option5);

        $option6 = $I->grabTextFrom('select option:nth-child(1)');
        $I->selectOption("select", $option6);
        
        $I->fillField('Semana','2021-1-20');
        
        $I->see('Save');
        $I->click('Save');
    }

}
