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

            $users = ['igor'=>'6ab84705e5d695efd532f462bc41ffc7a05f3a097b877dd2b95d168cd9f3b93d'];

            $usersadmin = ['admin'=>'8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918',
                'gabriel'=>'ff06535ac1029cca2fc2b86ac7355a7b4e0b8d839fc76b51d30833f4e1347ddc'];


            foreach ($users as $login =>$pwd) {
                if( $request->request->get('uname')== $login &&
                    hash("sha256",$request->request->get('psw'))==$pwd ) //hash alterado
                {
                    $this->session = new Session();
                    $this->session->set('user',$login);
                    return new RedirectResponse('sistema');
                }

            }
            foreach ($usersadmin as $login =>$pwd) {
                if ($request->request->get('uname') == $login &&
                    hash("sha256", $request->request->get('psw')) == $pwd   //hash alterado
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
