<?php namespace frontend\tests;

use frontend\models\Cliente;
use common\models\User;

class regclienteTest extends \Codeception\Test\Unit
{

    public $password;
    public $date;
    public $data;

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
    public function testSomeFeature()
    {
        $user = new User();
        $cliente = new Cliente();

        $user->username = 'userteste';
        $user->email = 'userteste@gmail.com';
        $this->password ='teste123';
        $user->primeiroNome = 'User';
        $user->apelido = 'teste';
        $user->sexo = 'Masculino';
        $user->num_tele = 123456789;
        $date = date_create();
        date_date_set($date,1999,12,27);
        $data = date_format($date,"Y-m-d");
        $user->dt_nascimento = $data;
        
        $cliente->nif = 123456789;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();
        $cliente->User_id = $user->id;
        $cliente->save();

        $this->tester->seeInDatabase('user',['username' => 'userteste']);
        $this->tester->seeInDatabase('cliente',['nif' => 123456789]);
    }
}