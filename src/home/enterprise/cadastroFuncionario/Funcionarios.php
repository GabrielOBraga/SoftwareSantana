<?php

declare (strict_types=1);
namespace home\enterprise\cadastroFuncionario;

use home\enterprise\Model;
use home\errors\InvalidArgument;

class Funcionarios extends Model
{
    protected $nome;
    protected $cpf;

    protected $dia;
    protected $mes;
    protected $ano;

    protected $telefone;
    protected $email;

    protected $endereco;
    protected $cep;

    protected $salario;
    protected $comissao;
    protected $nVendas;

    public function   __construct(string $nome, string $cpf , string $endereco, string $telefone){
        if($cpf== null || $nome==null || $endereco==null || $telefone==null){
            throw new InvalidArgument("Todos os campos devem ser preenchidos.");
        }

        if(preg_match("[^0-9]",$telefone)==1 || strlen($telefone)<8 || strlen($telefone)>11){
            throw new InvalidArgument("Telefone deve conter apenas caracteres numéricos/telefone é inválido.");
        }

        $this->cpf = (int)preg_replace( '/[^0-9]/', '', $cpf );
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSalario(float $salario)
    {
        $this->salario = $salario;
    }

    public function setComissao(float $comissao)
    {
        $this->comissao = $comissao;
    }

    public function setVendas(int $vendas)
    {
        $this->vendas = $vendas;
    }

    public function setFone(string $fone)
    {
        $this->fone = $fone;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    public function setNVendas($nVendas)
    {
        $this->nVendas = $nVendas;
    }

    public function getCpf ( ):int
    {
        return $this->cpf;
    }

    public function getNome ( ):string {
        return $this->nome;
    }

    public function getSalario():float
    {
        return $this->salario;
    }

    public function getComissao():float
    {
        return $this->comissao;
    }

    public function calcularSalario ()
    {
        $this->setSalario($this->getSalario() + $this->nVendas * $this->getComissao());
    }


    public function resetVendas ()
    {
        $this->vendas = 0;
    }

    public function getFone():string
    {
        return $this->telefone;
    }

    public static function getIdAttribute()
    {
        return 'cpf';
    }

    public static function  getClassName()
    {
        return 'Funcionarios';
    }
}