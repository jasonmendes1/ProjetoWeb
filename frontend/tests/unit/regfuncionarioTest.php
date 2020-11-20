<?php namespace frontend\tests;

use common\models\User;
use frontend\models\Funcionario;

class regfuncionarioTest extends \Codeception\Test\Unit
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
        /*
        $user = new User();
        $funcio = new Funcionario();

        $user->username = 'func2';
        $user->email = 'func2@gmail.com';
        $this->password = 'pass';

        $funcio->primeiroNome = 'funcio1';
        $funcio->apelido = '1';
        $funcio->sexo = 'Feminino';
        $funcio->num_tele = 123456789;
        $funcio->avatar = 'pfihfhug0';
        $date = date_create();
        date_date_set($date,1985,05,14);
        $data = date_format($date,"Y-m-d");
        $funcio->dt_nascimento = $data;

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        //$funcio->cargo = 1;

        $user->save();
        $funcio->User_id = $user->id;
        $funcio->save();

        $this->tester->seeInDatabase('user',['username' => 'func2']);
        $this->tester->seeInDatabase('funcionario', ['primeiroNome' => 'funcio1']);
        */

        $funcio = new Funcionario();
        $funcio->primeiroNome = 'funcio';
        $funcio->apelido = '1';
        $funcio->sexo = 'Feminino';
        $funcio->num_tele = 123456789;
        $funcio->avatar = 'pfihfhug0';
        $date = date_create();
        date_date_set($date,1985,05,14);
        $data = date_format($date,"Y-m-d");
        $funcio->dt_nascimento = $data;
        $funcio->cargo_id = 1;


        $funcio->User_id = 3;
        $funcio->save();
        $this->tester->seeInDatabase('funcionario', ['primeiroNome' => 'funcio']);
    }
}