<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('ya/projetoweb/frontend/web/index.php');
        $I->wait(2); // wait for page to be opened

        $I->see('Fitness League');

        $I->see('Registar/Login');
        $I->click('Registar/Login');
        $I->wait(2); // wait for page to be opened
        $I->click('Fazer Login');
        $I->wait(2); // wait for page to be opened
        $I->see('Username');
        $I->fillField('LoginForm[username]', 'jason');
        $I->wait(1); // wait for page to be opened
        $I->fillField('LoginForm[password]', '123123123');
        $I->wait(1); // wait for page to be opened
        $I->click('login-button');
        $I->wait(5); // wait for page to be opened
    }
}
