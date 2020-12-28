<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class LoginCest
{
    public function tryLogin(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->click('Registar/Login');
        $I->click('Fazer Login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username', 'userteste');
        $I->fillField('Password', 'passwordteste');
        $I->see('Remember Me');
        $I->click('Login'); // NÃO CONSEGUE VER ESTE BOTÃO POR ALGUMA RAZÃO, FIXAR ISTO LATER
        $I->see('O seu ginásio tecnológico');
        $I->click('Registar/Login');
        $I->click( 'logout-button');
    }

}
