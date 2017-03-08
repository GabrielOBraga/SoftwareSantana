<?php

declare (strict_types=1);
namespace home\enterprise\cadastroProdutos;

use home\enterprise\Model;
use home\errors\InvalidArgument;

class Produto extends Model
{
    protected $ref;
    protected $descricao;
    protected $valor;
    protected $quantidade;

    function __construct(string $descricao,string $referencia ,float $valor)
    {

        if($descricao== null || $referencia==null || $valor==null){
            throw new InvalidArgument("Todos os campos devem ser preenchidos.");
        }

        if ($valor == 0 || preg_match("[^0-9]",$valor)==2)
        {
            throw new InvalidArgument("Valor Invalido");
        }

        $this->descricao = $descricao;
        $this->ref = $referencia;
        $this->valor = $valor;
        $this->quantidade = 0;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function addQuantidade(int $quantidade)
    {
        if ($quantidade < $this->quantidade){
            throw new InvalidArgument("Quantidade Vendida Menor que Estoque");
        }
        $this->quantidade = $quantidade + $this->quantidade;
    }


    public function getIdAttribute()
    {
        return 'ref';
    }

    public function  getClassName()
    {
        return 'Produto';
    }
}