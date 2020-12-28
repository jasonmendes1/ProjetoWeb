<?php namespace backend\tests;

use common\models\Cliente;
use Symfony\Component\BrowserKit\Client;

class ClienteTest extends \Codeception\Test\Unit
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

    // tests
    public function testValidation()
    {
        $cliente = new Cliente();
        
        $cliente->primeiroNome = null;
        $this->assertFalse($cliente->validate(['primeiroNome']));
        $cliente->primeiroNome = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhss';
        $this->assertFalse($cliente->validate(['primeiroNome']));
        $cliente->primeiroNome = 'Jason';
        $this->assertTrue($cliente->validate(['primeiroNome']));

        $cliente->apelido = null;
        $this->assertFalse($cliente->validate(['apelido']));
        $cliente->apelido = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhss';
        $this->assertFalse($cliente->validate(['apelido']));
        $cliente->apelido = 'Mendes';
        $this->assertTrue($cliente->validate(['apelido']));

        $cliente->dt_nascimento = null;
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = '2000-07-09 00:00:00';
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = 'Texto';
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = '2000-07-09';
        $this->assertTrue($cliente->validate(['dt_nascimento']));

        $cliente->sexo = null;
        $this->assertFalse($cliente->validate(['sexo']));
        $cliente->sexo = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhss';
        $this->assertFalse($cliente->validate(['sexo']));
        $cliente->sexo = 'Masculino';
        $this->assertTrue($cliente->validate(['sexo']));

        $cliente->avatar = null;
        $this->assertTrue($cliente->validate(['avatar']));
        $cliente->avatar = null;
        $this->assertTrue($cliente->validate(['avatar']));

        $cliente->num_tele = null;
        $this->assertTrue($cliente->validate(['num_tele']));
        $cliente->num_tele = 'Texto';
        $this->assertTrue($cliente->validate(['num_tele']));
        $cliente->num_tele = '123456789';
        $this->assertTrue($cliente->validate(['num_tele']));

        $cliente->nif = null;
        $this->assertTrue($cliente->validate(['nif']));
        $cliente->nif = 'Texto';
        $this->assertTrue($cliente->validate(['nif']));  
        $cliente->nif = '123456789';
        $this->assertTrue($cliente->validate(['nif']));  

        $cliente->altura = null;
        $this->assertTrue($cliente->validate(['altura']));
        $cliente->altura = 'Texto';
        $this->assertTrue($cliente->validate(['altura']));   
        $cliente->altura = '170';
        $this->assertTrue($cliente->validate(['altura'])); 

        $cliente->peso = null;
        $this->assertTrue($cliente->validate(['peso']));
        $cliente->peso = 'Texto';
        $this->assertTrue($cliente->validate(['peso']));   
        $cliente->peso = '65';
        $this->assertTrue($cliente->validate(['peso']));  

        $cliente->massa_muscular = null;
        $this->assertTrue($cliente->validate(['massa_muscular']));
        $cliente->massa_muscular = 'Texto';
        $this->assertTrue($cliente->validate(['massa_muscular']));   
        $cliente->massa_muscular = '50';
        $this->assertTrue($cliente->validate(['massa_muscular']));  

        $cliente->massa_gorda = null;
        $this->assertTrue($cliente->validate(['massa_gorda']));
        $cliente->massa_gorda = 'Texto';
        $this->assertTrue($cliente->validate(['massa_gorda']));   
        $cliente->massa_gorda = '50';
        $this->assertTrue($cliente->validate(['massa_gorda']));  
    }

    function testSavingUser()
    {
        $cliente = new Cliente();
        $cliente->primeiroNome = 'Profileeeeee';
        $cliente->apelido = 'Apelido';
        $cliente->dt_nascimento = '2000-02-04';
        $cliente->sexo = 'Masculino';
        $cliente->avatar = null;
        $cliente->num_tele = '912345678';
        $cliente->nif = '123456789';
        $cliente->altura = '170';
        $cliente->peso = '65';
        $cliente->massa_muscular = '50';
        $cliente->massa_gorda = '50';
        $cliente->IdUser = 3;
        $cliente->save();

        $this->tester->seeInDatabase('profiles', ['Nome' => 'Profileeeeee']);
    }
    
    function testUserNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Cliente', ['primeiroNome' => 'Profileeeeee']);

        $cliente = Cliente::findOne($id);
        $cliente->primeiroNome = ('Teste');
        $cliente->save();

        $this->tester->seeRecord('common\models\Cliente', ['primeiroNome' => 'Teste']);
        $this->tester->dontSeeRecord('common\models\Cliente', ['primeiroNome' => 'Profileeeeee']);
    }

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Cliente', ['primeiroNome' => 'Teste']);

        $cliente = Cliente::findOne($id);
        $cliente->delete();

        $this->tester->dontSeeRecord('common\models\Cliente', ['primeiroNome' => 'Teste']);
    }
}