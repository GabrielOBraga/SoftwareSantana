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


class Controller
{
    protected $newLogin;
    protected  $session;
    protected $produtos;

    public function indexAction (Request $request){
        $this->session= new Session();
        if ( $request->getMethod()=='POST'){
        }
        ob_start();
        include sprintf(__DIR__ . '/../view/index.php');
        return new Response( ob_get_clean());

    }

    public function contactAction (Request $request)
    {
        $permission = [''];
        $this->session= new Session();
        $user = $this->session->get('user');

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
        include sprintf(__DIR__ . '/../view/contact.php');
        return new Response( ob_get_clean());
    }


    public function  loginAction ( Request $request)
    {
        if ( $request->getMethod()==  'POST'){

            $users = ['igor'=>'c654b12073b16a53009afcf1455154323e7b810f9f479150ca3a204f9fd788ee'];

            $usersadmin = ['admin'=>'d977adfeadb4840cc3b51dee48234a12cb0febbe38a9910ffd0b449f16844f5c',
                'gabriel'=>'7dbe361fd8faf3848c07e163662e5e3c05a9f6f08d4accfa83d949481f8d5153'];


            foreach ($users as $login =>$pwd) {
                if( $request->request->get('uname')== $login &&
                    hash("sha256",$request->request->get('psw').'tadayuki')==$pwd )
                {
                    $this->session = new Session();
                    $this->session->set('user',$login);
                    return new RedirectResponse('sistema');
                }

            }
            foreach ($usersadmin as $login =>$pwd) {
                if ($request->request->get('uname') == $login &&
                    hash("sha256", $request->request->get('psw') . 'tadayuki') == $pwd
                ) {
                    $this->session = new Session();
                    $this->session->set('user', $login);
                    return new RedirectResponse('adm');
                }
            }

            //colocar um flash message
        }
        return $this->render_view('login');
    }

    public function render_view(string $route){
        ob_start();
        include sprintf(__DIR__."/../view/$route.php");
        return new Response (ob_get_clean());
    }

}
