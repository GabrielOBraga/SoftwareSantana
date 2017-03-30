<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 08/03/2017
 * Time: 14:34
 */

namespace home\tests\enterprise\cadastroFuncionario;
use \home\enterprise\cadastroFuncionario\Funcionarios;


class FuncionariosTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidName
     */
    public function testConstructorValidName (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone);
        $this->assertEquals($funcObj1->getNome(),$name);
    }

    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidName
     * @expectedException \home\errors\InvalidArgument
     */
    public function testConstructorInvalidName (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
    }

    /**
     * Test if the constructor's cpf is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestValidCpf
     */
    public function testValidCpf (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
    }

    /**
     * Test if the constructor's cpf is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestInvalidCpf
     * @expectedException \home\errors\InvalidArgument
     */
    public function testInvalidCpf (string $name, string $cpf, string $endereco, string $telefone)
    {
        $funcObj1 = new Funcionarios($name, $cpf, $endereco, $telefone);
    }

    /**
     * Test if the constructor's endereco is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidEndereco
     */
    public function testConstructorValidEndereco (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
    }

    /**
     * Test if the constructor's endereco is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidEndereco
     * @expectedException \home\errors\InvalidArgument
     */
    public function testConstructorInvalidEndereco (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
    }


    /**
     * Test if the constructor's telefone is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidFone
     */
    public function testConstructorValidFone(string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
        $this->assertEquals($funcObj1->getFone(),$telefone);
    }

    /**
     * Test if the constructor's telefone is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidFone
     * @expectedException \home\errors\InvalidArgument
     */
    public function testConstructorInvalidFone (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }

    public function providerTestConstructorValidName (){
        return [
            ['Igor Tadayuki Hangui Silva','70393778100','Rua     ','81765519'],
            ['Gabriel Oliveira Braga','66658742227','Av.      ','92855617']
        ] ;
    }

    public function providerTestConstructorInvalidName (){
        return [
            ['Igor Tadayuki 434Hangui Silva','70393778100','Rua     ','81765519'],
            ['Gabriel Olive3545ira Braga','66658742227','Av.      ','92855617']
        ] ;
    }
    public function providerTestValidCpf (){
        return [
            ['Igor','703.937.781-00','Rua     ','81765519'],
            ['Igor','33160667480','Av.      ','92855617'],
            ['Gabriel Oliveira Braga','66658742227','Av.      ','92855617']
        ];
    }

    public function providerTestInvalidCpf (){
        return [
            ['Igor','111.111.111-11','Rua     ','81765519'],
            ['Igor','222.222.222-22','Rua     ','81765519'],
            ['Igor','333.333.333-33','Rua     ','81765519'],
            ['Igor','444.444.444-44','Rua     ','81765519'],
            ['Igor','222.222.222.222-00','Rua     ','81765519'],
            ['Igor','2222222200','Rua     ','81765519'],
            ['Igor','00000000000000000000000000','Rua     ','81765519'],
            ['Gabriel','12345679885752','Rua     ','81765519'],
            ['Gabriel','12345678901','Rua     ','81765519']
        ] ;
    }

    public function providerTestConstructorValidEndereco (){
        return [
            ['Igor','70393778100','Av. Visconde Taunay','981765519'],
            ['Gabriel','66658742227','Av. Ayrton Senna','92855617']
        ] ;
    }

    public function providerTestConstructorInvalidEndereco (){
        return [
            ['Igor','70393778100','74542424','981765519'],
            ['Gabriel','70393778100','!@#$%¨&*(','981765519']
        ] ;
    }

    public function providerTestConstructorValidFone (){
        return [
            ['Igor','70393778100','Av. Visconde Taunay','981765519'],
            ['Gabriel','70393778100','Av. Visconde Taunay','12345678'],
            ['Gabriel','70393778100','Av. Visconde Taunay','123456789'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-8911'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-8911'],
            ['Gabriel','70393778100','Av. Visconde Taunay','1234-5678']
        ] ;
    }

    public function providerTestConstructorInvalidFone (){
        return [
            ['Igor','70393778100','Av. Visconde Taunay',''],
            ['Gabriel','70393778100','Av. Visconde Taunay','1234567891112'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-89119'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-89119'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-8'],
            ['Gabriel','70393778100','Av. Visconde Taunay','4567-8'],
            ['Gabriel','70393778100','Av. Visconde Taunay','1234567'],
            ['Gabriel','70393778100','Av. Visconde Taunay','123456'],
            ['Gabriel','70393778100','Av. Visconde Taunay','12'],
        ] ;
    }
}
}
