<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 08/03/2017
 * Time: 15:26
 */

namespace home\tests\enterprise\cadastroServiceCar;
use home\enterprise\cadastroServiceCar\ServicosCar;

class ServicosCarTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidName
     */
    public function testConstructorValidName (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $this->assertEquals($servObj1->getName(),$name);
    }
    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidName
     */
    public function testConstructorInvalidName (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
    }

    /**
     * Test if the constructor's email is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidEmail
     */
    public function testConstructorValidEmail (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $this->assertEquals($servObj1->getEmail(),$email);
    }
    /**
     * Test if the constructor's email is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidEmail
     */
    public function testConstructorInvalidEmail (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
    }


    /**
     * Test if the constructor's telefone is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidTelefone
     */
    public function testConstructorValidTelefone (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $this->assertEquals($servObj1->getFone(),$telefone);
    }
    /**
     * Test if the constructor's telefone is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidTelefone
     */
    public function testConstructorInvalidTelefone (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
    }


    /**
     * Test if the Localizacao is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @param float $posX
     * @param float $posY
     * @dataProvider  providerTestConstructorValidLocalizacao
     */
    public function testConstructorValidLocalizacao (string $name ,string $email ,string $telefone ,float $posX , float $posY)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $servObj1->setLocalizacao($posX,$posY);
        $localizacao = [$posX , $posY];
        $this->assertEquals($servObj1->getLocalizacao(),$localizacao);
    }
    /**
     * Test if the Localizacao is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @param float $posX
     * @param float $posY
     * @dataProvider  providerTestConstructorInvalidLocalizacao
     */
    public function testConstructorInvalidLocalizacao (string $name ,string $email ,string $telefone , float $posX , float $posY)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $servObj1->setLocalizacao($posX,$posY);
        $localizacao = [$posX , $posY];
        $servObj1->getLocalizacao();
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
            ['Victor','victor@gmail.com' , ''],
            ['Gabriel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678']
        ] ;
    }


    public function providerTestConstructorInvalidName (){
        return [
            ['Victor 34','victor@gmail.com' , ''],
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678']
        ] ;
    }


    public function providerTestConstructorValidEmail (){
        return [
            ['Gabriel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678'],
            ['G@briel','braga1233@gmail.com','(12) 3 1234 - 5678'],
            ['G@briel','braga1998@hotmail.com','(12) 3 1234 - 5678'],
        ] ;
    }


    public function providerTestConstructorInvalidEmail (){
        return [
            ['Victor 34','victor@gmail.com' , ''],
            ['G@briel','gabriel_o_bragahotmail.com','(12) 3 1234 - 5678'],
            ['G@briel','gabrielcom','(12) 3 1234 - 5678'],
            ['G@briel','@@@@@@','(12) 3 1234 - 5678'],
            ['G@briel','@.com','(12) 3 1234 - 5678'],
        ] ;
    }


    public function providerTestConstructorValidTelefone (){
        return [
            ['Gabriel','gabriel_o_braga@hotmail.com' , '3317 - 1751'],
            ['Gabriel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678'],
            ['Gabriel','gabriel_o_braga@hotmail.com','12312345678'],
            ['Gabriel','gabriel_o_braga@hotmail.com','1234-5678'],
            ['Gabriel','gabriel_o_braga@hotmail.com','12312345678'],
        ] ;
    }


    public function providerTestConstructorInvalidTelefone (){
        return [
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 567811'],
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 56789'],
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - '],
            ['G@briel','gabriel_o_braga@hotmail.com','(1234567'],
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 567891113'],
            ['G@briel','gabriel_o_braga@hotmail.com',''],
            ['G@briel','gabriel_o_braga@hotmail.com','asdf']
        ] ;
    }


    public function providerTestInvalidLocalizacao (){
        return [
            ['Victor 34','victor@gmail.com' , ''],
            ['G@briel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678']
        ] ;
    }


    public function providerTestValidLocalizacao (){
        return [
            ['Gabriel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678'],
            ['G@briel','braga1233@gmail.com','(12) 3 1234 - 5678'],
            ['G@briel','braga1998@hotmail.com','(12) 3 1234 - 5678'],
        ] ;
    }
}
