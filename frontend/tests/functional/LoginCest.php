<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class LoginCest
{
    public function tryLogin(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->see('Fitness League');
        $I->click('Registar/Login');
        $I->click('Fazer Login');
        $I->see('Please fill out the following fields to login:');
        $I->fillField('Username', 'jason');
        $I->fillField('Password', '123123123');
        $I->see('Remember Me');
        $I->click('login-button');
        $I->see('Fitness League');
        $I->click('Logout');
        $I->click('logout-button');
    }

}
