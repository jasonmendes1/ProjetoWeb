<?php namespace backend\tests;

use common\models\User;
use app\models\Funcionario;
use DateTime;

class FuncionarioTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }
    
    
    public function testValidation()
    {

        $funcionario = new Funcionario();
        
        $funcionario->primeiroNome = null;
        $this->assertFalse($funcionario->validate(['primeiroNome']));
        $funcionario->primeiroNome = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($funcionario->validate(['primeiroNome']));
        $funcionario->primeiroNome = 'Jason';
        $this->assertTrue($funcionario->validate(['primeiroNome']));

        $funcionario->apelido = null;
        $this->assertFalse($funcionario->validate(['apelido']));
        $funcionario->apelido = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($funcionario->validate(['apelido']));
        $funcionario->apelido = 'Mendes';
        $this->assertTrue($funcionario->validate(['apelido']));

/*
        $funcionario->dt_nascimento = null;
        $this->assertFalse($funcionario->validate(['dt_nascimento']));
        $funcionario->dt_nascimento = '1999-12-27 00:00:00';
        $this->assertFalse($funcionario->validate(['dt_nascimento']));
        $funcionario->dt_nascimento = 'Texto';
        $this->assertFalse($funcionario->validate(['dt_nascimento']));
        $funcionario->dt_nascimento = '1999-12-27';
        $this->assertTrue($funcionario->validate(['dt_nascimento']));
*/

        $funcionario->sexo = null;
        $this->assertFalse($funcionario->validate(['sexo']));
        $funcionario->sexo = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($funcionario->validate(['sexo']));
        $funcionario->sexo = 'Masculino';
        $this->assertTrue($funcionario->validate(['sexo']));

        $funcionario->avatar = null;
        $this->assertFalse($funcionario->validate(['avatar']));
        $funcionario->avatar = 'avatar.png';
        $this->assertTrue($funcionario->validate(['avatar']));

        $funcionario->num_tele = null;
        $this->assertFalse($funcionario->validate(['num_tele']));
        $funcionario->num_tele = 'Texto';
        $this->assertFalse($funcionario->validate(['num_tele']));
        $funcionario->num_tele = '123456789';
        $this->assertTrue($funcionario->validate(['num_tele']));
    }

    function testSavingUser()
    {
        
        $user = new User();
        $user->username = 'testefuncionario';
        $user->email = 'testefuncionario@teste.com';

        $user->setPassword('testefuncionario');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;

        $user->save();

        $funcionario = new Funcionario();
        $funcionario->User_id = $user->id;
        $funcionario->primeiroNome= 'Teste';
        $funcionario->apelido = 'Funcionario';
        $funcionario->dt_nascimento = DateTime::createFromFormat('m-d-Y', '12-27-1999')->format('Y-m-d');
        $funcionario->sexo = 'Masculino';
        $funcionario->avatar = 'avatar.png';
        $funcionario->num_tele = 123456789;
        $funcionario->cargo_id = 3;
        $funcionario->save();

        $this->tester->seeInDatabase('funcionario', ['primeiroNome' => 'Teste']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Funcionario', ['primeiroNome' => 'Teste']);

        $funcionario = Funcionario::findOne($id);
        $funcionario->primeiroNome = ('Testeteste');
        $funcionario->save();

        $this->tester->seeRecord('common\models\Funcionario', ['primeiroNome' => 'Testeteste']);
        $this->tester->dontSeeRecord('common\models\Funcionario', ['primeiroNome' => 'Teste']);
    }
    
    
    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Funcionario', ['primeiroNome' => 'Testeteste']);

        $funcionario = Funcionario::findOne($id);
        $funcionario->delete();

        $this->tester->dontSeeRecord('common\models\Funcionario', ['primeiroNome' => 'Testeteste']);
    }
}