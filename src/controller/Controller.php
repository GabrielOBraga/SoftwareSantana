<?php
declare (strict_types=1);
namespace  src\controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Plasticbrain\FlashMessages\FlashMessages;

use src\enterprise\cadastroProdutos\produto;

use src\enterprise\cadastroFuncionario\Funcionarios;
use src\enterprise\cadastroServiceCar\servicosCar;
use src\enterprise\contactCliente\webmail;
use src\errors\InvalidArgument;

class Controller
{
    protected $newLogin;
    protected $session;
    protected $produtos;

    public function indexAction (Request $request){
        $this->session= new Session();
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
                //implementar o recebimento do formulario de contato
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

    public function loginAction ( Request $request)
    {

        if ( $request->getMethod()==  'POST'){

            $users = ['igor'=>'73f6329219d4994f2acb7ac7280f6c18da346aefee01b7749596daf1cd01b4e8',
                'user'=>'08541a1932cfd4240a0c60cc03b46eadd9c3e369cad32c0789d9c795062bb6a0'];

            $usersadmin = ['admin'=>'e0c7dd217f6cd20d8f729e82c67d1382a078b9a5b94199e87bd4d424dec18dc1',
                'gabriel'=>'c86567fd32867a35109099eb2ccd2058eb6b28b7632bb8c217fa965060f12bb9'];


            foreach ($users as $login =>$pwd) {
                if( $request->request->get('uname')== $login &&
                    hash("sha256",$request->request->get('psw') . 'OiAlessandro')==$pwd ) //hash alterado
                {
                    $this->session = new Session();
                    $this->session->set('user',$login);
                    return new RedirectResponse('sistema');
                }

            }
            foreach ($usersadmin as $login =>$pwd) {
                if ($request->request->get('uname') == $login &&
                    hash("sha256", $request->request->get('psw') . 'OiAlessandro') == $pwd   //hash alterado
                ) {
                    $this->session = new Session();
                    $this->session->set('user', $login);
                    return new RedirectResponse('adm');
                }
            }

            $msg = new FlashMessages();
            $msg->error("Nome de usuário e/ou senha incorretos.");
            $msg->display();

        }
        return $this->render_view('login');
    }

    public function render_view(string $route){
        ob_start();
        include sprintf(__DIR__."/../view/$route.php");
        return new Response (ob_get_clean());
    }

}
