<?php
declare (strict_types=1);
namespace  src\controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use src\enterprise\cadastroProdutos\produto;

use src\enterprise\cadastroFuncionario\Funcionarios;
use src\enterprise\cadastroServiceCar\servicosCar;
use src\enterprise\contactCliente\webmail;
use src\errors\InvalidArgument;


class ControllerAdm
{
    protected $newLogin;
    protected  $session;
    protected $produtos;

    public function cFuncionarioAction (Request $request){
        $error = '';
        $this->session = new Session();
        $permission = ['admin' , 'gabriel'];
        $user = $this->session->get('user');
        if ( !in_array($user,$permission)){
            //add flash message
            return new RedirectResponse('index');
        }
        if ( $request->getMethod()=='POST')
        {
            try {
                $funcionario = new Funcionarios($request->request->get('firstName' . ' ' . $request->request->get('lastName')) ,$request->request->get('cpf'),$request->request->get('rua') , $request->request->get('telefone'));
                $funcionario->setEmail($request->request->get('email'));
                $funcionario->setNascimento($request->request->get('dia') . '/' . $request->request->get('mes') .'/' .$request->request->get('ano'));
                $funcionario->setCep($request->request->get('cep'));
                $funcionario->save();

                $this->session->set('Funcionario', $funcionario);
                return new RedirectResponse (__DIR__ . '/../view/adm.php');
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'Erro dados nao informados corretamente';
            }
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/cadastrofuncionario.php');
        return new Response( ob_get_clean());

    }


    public function admAction (Request $request){
        $this->session = new Session();
        $permission = ['admin' , 'gabriel'];
        $permission2 = ['igor'];
        $user = $this->session->get('user');


        if ( in_array($user,$permission2)){
            //add flash message
            return new RedirectResponse('sistema');
        }

        if ( !in_array($user,$permission)){
            //add flash message
            return new RedirectResponse('index');
        }

        if ( $request->getMethod()=='POST'){
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/adm.php');
        return new Response( ob_get_clean());

    }

    public function produtosAction (Request $request){

        $permission = ['gabriel','igor'];
        $this->session= new Session();
        $user = $this->session->get('user');
        if ( !in_array($user,$permission)){
            //add flash message
            return new RedirectResponse('index');
        }

        if ( $request->getMethod()=='POST'){
            try{
                $produto = new Produto($request->request->get('descricao') , $request->request->get('ref') , $request->request->get('valor'));
                $produto->save();
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'Erro dados nao informados corretamente';
            }
                    }
        ob_start();
        include sprintf(__DIR__ . '/../view/produtos.php');
        return new Response( ob_get_clean());

    }

    public function oticaMovelAction (Request $request){

        $permission = [''];
        $this->session= new Session();
        $user = $this->session->get('user');

        if ( $request->getMethod()=='POST'){
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/oticaMovel.php');
        return new Response( ob_get_clean());

    }

    public function localizacaoAction (Request $request){

        $permission = [''];
        $this->session= new Session();
        $user = $this->session->get('user');

        if ( $request->getMethod()=='POST'){
            try{
                $cliente = new ServicosCar($request->request->get('name') , $request->request->get('email') , $request->request->get('telefone'));
                $cliente->setLocalizacao($request->request->get('posX') , $request->request->get('posY'));
                $cliente->setEndereço($request->request->get('endereco'));
                $cliente->save();
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'Erro dados nao informados corretamente';
            }

        }
        ob_start();
        include sprintf(__DIR__ . '/../view/oticaMovel.php');
        return new Response( ob_get_clean());

    }

    public function vendasAction (Request $request)
    {
        $permission = ['gabriel','igor','adm'];
        $this->session= new Session();
        $user = $this->session->get('user');

        if ( !in_array($user,$permission)){
            //add flash message
            return new RedirectResponse('index');
        }

        if ( $request->getMethod()=='POST'){
            try{
            }
            catch ( InvalidArgument $e){
                $error=$e->getMessage();
            }
            catch ( \Throwable $e ){
                $error= 'Erro dados nao informados corretamente';
            }
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/vendas.php');
        return new Response( ob_get_clean());

    }

    public function render_view(string $route){
        ob_start();
        include sprintf(__DIR__."/../view/$route.php");
        return new Response (ob_get_clean());
    }

}
