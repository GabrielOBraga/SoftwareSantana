<?php
/**
 * Created by PhpStorm.
 * User: gabri
 * Date: 08/03/2017
 * Time: 14:55
 */

namespace home\tests\enterprise\cadastroProdutos;
use home\enterprise\cadastroProdutos\Produto;

class ProdutoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if the constructor's descricao is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorValidDescricao
     */
    public function testConstructorValidDescricao (string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor);
        $this->assertEquals($prodObj1->getDescricao(),$descricao);
    }

    /**
     * Test if the constructor's descricao is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorInvalidDescricao
     */
    public function testConstructorInvalidDescricao(string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor );
    }

    /**
     * Test if the constructor's referencia is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorValidReferencia
     */
    public function testConstructorValidReferencia (string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor);
        $this->assertEquals($prodObj1->getIdAttribute(),$referencia);
    }

    /**
     * Test if the constructor's referencia is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorInvalidReferencia
     */
    public function testConstructorInvalidReferencia (string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor);
    }


    /**
     * Test if the constructor's valor is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorValidValor
     */
    public function testConstructorValidValor (string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor);
        $this->assertEquals($prodObj1->getValor,$valor);
    }

    /**
     * Test if the constructor's valor is stored correctly
     * @param string $descricao
     * @param string $referencia
     * @param string $valor
     * @dataProvider  providerTestConstructorInvalidValor
     */
    public function testConstructorInvalidValor (string $descricao ,string $referencia ,float $valor)
    {
        $prodObj1 = new Produto($descricao , $referencia , $valor);
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
            ['Oculos','2345','5.5'],
            ['Oculos de Led','','5.5']
        ] ;
    }

    public function providerTestConstructorInvalidName (){
        return [
            ['Oculos @301-43','','5.5'],
            ['a s f t b f','','5.5']
        ] ;
    }


    public function providerTestConstructorValidReferencia (){
        return [
            ['Oculos','2345','5.5'],
            ['Oculos de Led','','5.5']
        ] ;
    }

    public function providerTestConstructorInvalidReferencia (){
        return [
            ['Oculos @301-43','','5.5'],
            ['a s f t b f','','5.5']
        ] ;
    }


    public function providerTestConstructorValidValor (){
        return [
            ['Oculos','2345','5.5'],
            ['Oculos de Led','','0.50']
        ] ;
    }

    public function providerTestConstructorInvalidValor (){
        return [
            ['Oculos @301-43','','5.5.90'],
            ['a s f t b f','','566666666.566666666666666']
        ] ;
    }

}