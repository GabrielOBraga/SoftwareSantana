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
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
        $this->assertEquals($funcObj1->getNome(),$name);
    }

    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidName
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
     * @dataProvider  providerTestConstructorValidCpf
     */
    public function testConstructorValidCpf (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
        $this->assertEquals($funcObj1->getCpf(),$cpf);
    }

    /**
     * Test if the constructor's cpf is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidCpf
     */
    public function testConstructorInvalidCpf (string $name , string $cpf , string $endereco , string $telefone)
    {
        $funcObj1 = new Funcionarios($name , $cpf, $endereco ,$telefone );
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
        $this->assertEquals($funcObj1->getEndereço,$endereco);
    }

    /**
     * Test if the constructor's endereco is stored correctly
     * @param string $name
     * @param string $cpf
     * @param string $endereco
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidEndereco
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
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }

    public function providerTestConstructorInvalidName (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }
    public function providerTestConstructorValidCpf (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }

    public function providerTestConstructorInvalidCpf (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }

    public function providerTestConstructorValidEndereco (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }

    public function providerTestConstructorInvalidEndereco (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','']
        ] ;
    }

    public function providerTestConstructorValidFone (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','12345678'],
            ['Gabriel','','','12345678911'],
            ['Gabriel','','','(12)3 4567-8911'],
            ['Gabriel','','','1234-5678']
        ] ;
    }

    public function providerTestConstructorInvalidFone (){
        return [
            ['Igor','','',''],
            ['Gabriel','','','1234567891112'],
            ['Gabriel','','','(12)3 4567-89119'],
            ['Gabriel','','','(12)3 4567-8'],
            ['Gabriel','','','12345678'],
            ['Gabriel','','','123456'],
            ['Gabriel','','','12'],
        ] ;
    }


}