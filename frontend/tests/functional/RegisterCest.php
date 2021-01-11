<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class RegisterCest
{
    public function tryCreateUser(FunctionalTester $I)
    {
        // Navegação desde Index até Registo
        $I->amOnPage(\yii::$app->homeUrl);
        $I->see('Fitness League');
        //$I->click('Convidado');
        $I->click('Registar');

        // Inserção de Dados
        $I->see('Signup');
        $I->fillField('Username', 'testefuncional');
        $I->fillField('Email', 'testefuncional@emailteste.com');
        $I->fillField('Password', 'testefuncional');
        //$I->click('SignupForm[avatar]');
       // $I->fillField('avatar', 'web/images/test.png');
        $I->attachFile('#signupform-avatar', 'logo.png');
        $I->fillField('Primeiro Nome', 'NomeTeste');
        $I->fillField('Apelido', 'ApelidoTeste');
        $I->fillField('Dt Nascimento', '1990-01-01');

        $option = $I->grabTextFrom('select option:nth-child(2)');
        $I->selectOption("select", $option);

        $I->fillField('Num Tele', '912345678');
        $I->fillField('Nif', '123456789');
        
        //Final Create
        $I->click('signup-button');
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }

}
