<?php
declare (strict_types=1);
namespace  home\controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use home\enterprise\cadastroProdutos\produto;

use home\enterprise\cadastroFuncionario\Funcionarios;
use home\enterprise\cadastroServiceCar\servicosCar;
use home\enterprise\contactCliente\webmail;
use home\errors\InvalidArgument;


class ControllerEnter
{
    protected $newLogin;
    protected  $session;
    protected $produtos;

    public function sistemaAction (Request $request){
        $this->session= new Session();
        $permission = ['igor'];
        $user = $this->session->get('user');
        if ( !in_array($user,$permission)){
            //add flash message
            return new RedirectResponse('index');
        }

        if ( $request->getMethod()=='POST'){
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/sistema.php');
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
