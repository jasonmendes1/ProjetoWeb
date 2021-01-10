<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class PlanoTreinoCest
{
    public function tryCreatePlanoTreino(FunctionalTester $I)
    {
        // Login User
        $I->amOnPage(\yii::$app->homeUrl);
        $I->see('Fitness League');
        $I->click('Registar/Login');
        $I->click('Fazer Login');
        $I->fillField('Username', 'funcionariotrainer');
        $I->fillField('Password', 'funcionariotrainer');
        $I->see('Remember Me');
        $I->click('login-button');
        //$I->see('Congratulations!');

        $I->see('Fitness League');
        $I->see('O seu ginásio tecnológico!');
        $I->click('Bem Vindo');
        $I->click('Criar Plano de Treino');

        $I->see('Create Planos Treino');

        $I->fillField('Dia Treino','2021-1-20');

        $I->see('Save');
        $I->click('Save');
    }
}
