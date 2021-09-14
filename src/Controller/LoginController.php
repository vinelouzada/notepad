<?php


namespace Louzada\NotePad\Controller;


use Louzada\NotePad\Helper\TraitFlashMessage;
use Louzada\NotePad\Model\User;

class LoginController implements ProcessRequestInterface
{
    use TraitFlashMessage;
    public function ProcessRequest(): void
    {
        $title1 = 'Login';
        $title = 'Login';
        $titleButton1 = 'Login';
        $titleButton2 = 'Sign Up';
        $linkButton2 = '/signup';
        $linkAction = '/login"';

        require __DIR__.'/../View/box-sign-in-up.php';


        try{
            if(isset($_POST['email'])) {
                $user = new User();
                $user->setEmail($_POST['email']);
                $user->setPassword($_POST['password']);
                $user->doLogin();
                header('Location: /notes');
            }
        }catch (\Exception $e){
            $this->defineMessage('error','Incorret email or password');
            header('Location: /login');
        }

    }
}