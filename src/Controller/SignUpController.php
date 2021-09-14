<?php


namespace Louzada\NotePad\Controller;


use Louzada\NotePad\Model\User;

class SignUpController implements ProcessRequestInterface
{

    public function ProcessRequest(): void
    {
        $title = 'Sign Up';
        $title1 = 'Sign Up';
        $titleButton1 = 'Sign Up';
        $titleButton2 = 'Back';
        $linkButton2 = '/login';
        $linkAction = '/signup"';
        $inputName = '<div class="input-login">
                    <input class="effect text-input" name="name" type="text" id="name" placeholder="Insert your Name" autocomplete="off">
                    <span class="input-border"></span>
                </div>';
        require __DIR__.'/../View/box-sign-in-up.php';

        try{
            if (isset($_POST['email'])){
                $name = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);

                if ((!empty($name) AND !empty($email) AND !empty($password)) AND
                    (($name !== false) AND ($email !== false) AND ($password !==false))){
                    $user = new User();
                    $user->setNome($name);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->createUser();
                    header('Location: /login');
                }
            }
        }catch (\Exception $e){
            echo $e;
            header('Location: /signup');
        }
    }
}