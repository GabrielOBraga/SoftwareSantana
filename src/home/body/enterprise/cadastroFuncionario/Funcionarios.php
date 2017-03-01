<?php

declare (strict_types=1);
namespace home\body\enterprise\cadastroProdutos;

use home\body\enterprise\Model;
use home\errors\InvalidArgument;

class Funcionario extends Model
{
    protected $nome;
    protected $cpf;
    private $salario;
    private $comissao;
    protected $nVendas;
    protected $telefone;
    protected $email;

    public function   __construct(string $nome, string $cpf , string $endereco, int $telefone){
        if($cpf== null || $nome==null || $endereco==null || $telefone==null){
            throw new InvalidArgument("Todos os campos devem ser preenchidos.");
        }

        if(!self::valida()){
            throw new InvalidArgument("CPF inválido.");
        }

        if(preg_match("[^0-9]",$telefone)==1 || strlen($telefone)<8 || strlen($telefone)>11){
            throw new InvalidArgument("Telefone deve conter apenas caracteres numéricos/telefone é inválido.");
        }

        $this->cpf = (int)preg_replace( '/[^0-9]/', '', $cpf );
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    public function getCpf ( ):int
    {
        return $this->cpf;
    }

    public function getNome ( ):string {
        return $this->nome;
    }

    public function setEmail($email)
    {
        $dominio=explode('@',$email);
        if($dominio[1]==null || !checkdnsrr($dominio[1],'A')){
            throw new InvalidArgument("E-mail inválido.");
        }

        $this->email = $email;
    }

    public function setSalario(float $salario)
    {
        $this->salario = $salario;
    }
    public function getSalario():float
    {
        return $this->salario;
    }

    public function getComissao():float
    {
        return $this->comissao;
    }
    public function setComissao(float $comissao)
    {
        $this->comissao = $comissao;
    }
    public function calcularSalario ()
    {
        $this->setSalario($this->getSalario() + $this->nVendas * $this->getComissao());
    }

    public function setVendas(int $vendas)
    {
        $this->vendas = $vendas;
    }
    public function resetVendas ()
    {
        $this->vendas = 0;
    }
    public function setFone(string $fone)
    {
        $this->fone = $fone;
    }
    public function getFone():int
    {
        return $this->telefone;
    }

    public static function getIdAttribute()
    {
        return 'cpf';
    }

    public static function  getClassName()
    {
        return 'funcionarios';
    }

    /**
     * Multiplica dígitos vezes posições
     *
     * @access protected
     * @param  string    $digitos      Os digitos desejados
     * @param  int       $posicoes     A posição que vai iniciar a regressão
     * @param  int       $soma_digitos A soma das multiplicações entre posições e dígitos
     * @return int                     Os dígitos enviados concatenados com o último dígito
     */
    protected function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {

        // Faz a soma dos dígitos com a posição
        // Ex. para 10 posições:
        //   0    2    5    4    6    2    8    8   4
        // x10   x9   x8   x7   x6   x5   x4   x3  x2
        //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
        for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
            // Preenche a soma com o dígito vezes a posição
            $soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );

            // Subtrai 1 da posição
            $posicoes--;

        }

        // Captura o resto da divisão entre $soma_digitos dividido por 11
        // Ex.: 196 % 11 = 9
        $soma_digitos = $soma_digitos % 11;

        // Verifica se $soma_digitos é menor que 2
        if ( $soma_digitos < 2 ) {
            // $soma_digitos agora será zero
            $soma_digitos = 0;
        } else {
            // Se for maior que 2, o resultado é 11 menos $soma_digitos
            // Ex.: 11 - 9 = 2
            // Nosso dígito procurado é 2
            $soma_digitos = 11 - $soma_digitos;
        }

        // Concatena mais um dígito aos primeiro nove dígitos
        // Ex.: 025462884 + 2 = 0254628842
        $cpf = $digitos . $soma_digitos;

        // Retorna
        return $cpf;
    }

    /**
     * Valida CPF
     *
     * @author                Luiz Otávio Miranda <contato@tutsup.com>
     * @access protected
     * @param  string    $cpf O CPF com ou sem pontos e traço
     * @return bool           True para CPF correto - False para CPF incorreto
     */
    protected function valida_cpf($cpf) {
        $valor = $cpf;
        // Deixa apenas números no valor
        $valor = preg_replace( '/[^0-9]/', '', $valor );
        $valor = (string)$valor;

        if (! strlen( $valor ) === 11 ) {
            return false;
        }

        $digitos = substr($valor, 0, 9);

        // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
        $novo_cpf = $this->calc_digitos_posicoes( $digitos );

        // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
        $novo_cpf = $this->calc_digitos_posicoes( $novo_cpf, 11 );

        // Verifica se o novo CPF gerado é idêntico ao CPF enviado
        if ( $novo_cpf === $valor ) {
            // CPF válido
            return true;
        } else {
            // CPF inválido
            return false;
        }
    }


    public function valida () {
        // Valida CPF
        if ( $this->valida_cpf($this->cpf) === 'CPF' ) {
            // Retorna true para cpf válido
            return $this->valida_cpf($this->cpf);
        }
        else {
            return false;
        }
    }

}