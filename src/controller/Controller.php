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

            $users = ['igor'=>'igor'];

            $usersadmin = ['admin'=>'admin',
                'gabriel'=>'gabriel'];


            foreach ($users as $login =>$pwd) {
                if( $request->request->get('uname')== $login &&
                    hash("sha256",$request->request->get('psw'))==$pwd )
                {
                    $this->session = new Session();
                    $this->session->set('user',$login);
                    return new RedirectResponse('sistema');
                }

            }
            foreach ($usersadmin as $login =>$pwd) {
                if ($request->request->get('uname') == $login &&
                    hash("sha256", $request->request->get('psw')) == $pwd
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
