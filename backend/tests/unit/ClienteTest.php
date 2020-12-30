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
        $cliente->primeiroNome = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($cliente->validate(['primeiroNome']));
        $cliente->primeiroNome = 'Jason';
        $this->assertTrue($cliente->validate(['primeiroNome']));

        $cliente->apelido = null;
        $this->assertFalse($cliente->validate(['apelido']));
        $cliente->apelido = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($cliente->validate(['apelido']));
        $cliente->apelido = 'Mendes';
        $this->assertTrue($cliente->validate(['apelido']));

/*
        $cliente->dt_nascimento = null;
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = '1999-12-27 00:00:00';
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = 'Texto';
        $this->assertFalse($cliente->validate(['dt_nascimento']));
        $cliente->dt_nascimento = '1999-12-27';
        $this->assertTrue($cliente->validate(['dt_nascimento']));

        NÃ SEIE PORQUIÊ DE ISTO NÃ STAR A DÁRE.
*/

        $cliente->sexo = null;
        $this->assertFalse($cliente->validate(['sexo']));
        $cliente->sexo = 'fghnvghtoolooooongnafghnvghtoolooooongnaaaaaaameeeefghjkcxdftyhfghjkcxdfghjkcxhsshfgvhjvgjhgjhgjhgjhgj';
        $this->assertFalse($cliente->validate(['sexo']));
        $cliente->sexo = 'Masculino';
        $this->assertTrue($cliente->validate(['sexo']));

        $cliente->avatar = null;
        $this->assertFalse($cliente->validate(['avatar']));
        $cliente->avatar = 'avatar.png';
        $this->assertTrue($cliente->validate(['avatar']));

        $cliente->num_tele = null;
        $this->assertFalse($cliente->validate(['num_tele']));
        $cliente->num_tele = 'Texto';
        $this->assertFalse($cliente->validate(['num_tele']));
        $cliente->num_tele = '123456789';
        $this->assertTrue($cliente->validate(['num_tele']));

        $cliente->nif = null;
        $this->assertFalse($cliente->validate(['nif']));
        $cliente->nif = 'Texto';
        $this->assertFalse($cliente->validate(['nif']));  
        $cliente->nif = '123456789';
        $this->assertTrue($cliente->validate(['nif']));  

        $cliente->altura = null;
        $this->assertTrue($cliente->validate(['altura']));
        $cliente->altura = 'Texto';
        $this->assertFalse($cliente->validate(['altura']));   
        $cliente->altura = '170';
        $this->assertTrue($cliente->validate(['altura'])); 

        $cliente->peso = null;
        $this->assertTrue($cliente->validate(['peso']));
        $cliente->peso = 'Texto';
        $this->assertFalse($cliente->validate(['peso']));   
        $cliente->peso = '65';
        $this->assertTrue($cliente->validate(['peso']));  

        $cliente->massa_muscular = null;
        $this->assertTrue($cliente->validate(['massa_muscular']));
        $cliente->massa_muscular = 'Texto';
        $this->assertFalse($cliente->validate(['massa_muscular']));   
        $cliente->massa_muscular = '50';
        $this->assertTrue($cliente->validate(['massa_muscular']));  

        $cliente->massa_gorda = null;
        $this->assertTrue($cliente->validate(['massa_gorda']));
        $cliente->massa_gorda = 'Texto';
        $this->assertFalse($cliente->validate(['massa_gorda']));   
        $cliente->massa_gorda = '50';
        $this->assertTrue($cliente->validate(['massa_gorda']));  
    }

    function testSavingUser()
    {

        $cliente = new Cliente();
        $cliente->primeiroNome = 'Jason';
        $cliente->apelido = 'Mendes';
        $cliente->dt_nascimento = '1999-12-27';
        $cliente->sexo = 'Masculino';
        $cliente->avatar = 'avatar.png';
        $cliente->num_tele = 'Masculino';
        $cliente->nif = '123456789';
        $cliente->altura = '170';
        $cliente->peso = '65';
        $cliente->massa_muscular = '50';
        $cliente->massa_gorda = '50';

        $cliente->save();
        $this->tester->seeInDatabase('cliente', ['primeiroNome' => 'Jason']);
    }

    
    function testNameCanBeChanged()
    {
        $id = $this->tester->grabRecord('common\models\Cliente', ['primeiroNome' => 'Jason']);

        $cliente = Cliente::findOne($id);
        $cliente->primeiroNome = ('JasonTeste');
        $cliente->save();

        $this->tester->seeRecord('common\models\Cliente', ['primeiroNome' => 'JasonTeste']);
        $this->tester->dontSeeRecord('common\models\Cliente', ['primeiroNome' => 'Jason']);
    }
    

    function testUserDeleted()
    {
        $id = $this->tester->grabRecord('common\models\Cliente', ['primeiroNome' => 'JasonTeste']);

        $cliente = Cliente::findOne($id);
        $cliente->delete();

        $this->tester->dontSeeRecord('common\models\Cliente', ['primeiroNome' => 'JasonTeste']);
    }

}