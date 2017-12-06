<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 08/03/2017
 * Time: 15:26
 */

namespace src\tests\enterprise\cadastroServiceCar;
use src\enterprise\cadastroServiceCar\ServicosCar;

use PHPUnit\Framework\TestCase;

class ServicosCarTest extends TestCase
{
    /**
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorValidCar
     */
    public function testConstructorValidCar (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
        $this->assertEquals($name , $servObj1->getName());
    }
    /**
     * Test if the constructor's name is stored correctly
     * @param string $name
     * @param string $email
     * @param string $telefone
     * @dataProvider  providerTestConstructorInvalidCar
     * @expectedException \src\errors\InvalidArgument
     */
    public function testConstructorInvalidCar (string $name ,string $email ,string $telefone)
    {
        $servObj1 = new ServicosCar($name , $email , $telefone);
    }

    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }

    public function providerTestConstructorValidCar (){
        return [
            ['Victor','victor@gmail.com' , '62 99258-5617'],
            ['Gabriel','gabriel_o_braga@hotmail.com','(12) 3 1234 - 5678']
        ] ;
    }


    public function providerTestConstructorInvalidCar (){
        return [
            ['Victor 34','victor@gmail.com' , ''],
            ['G@briel','','(12) 3 1234 - 5678']
        ] ;
    }

}
