<?php
namespace Louzada\NotePad\Controller;
use Louzada\NotePad\Helper\TraitFlashMessage;
use Louzada\NotePad\Model\User;

class IndexController implements ProcessRequestInterface
{
    use TraitFlashMessage;
    public function processRequest():void{
        $title1 = 'Notes';
        $title2 = 'Note<span>Pad</span>';
        $user = new User();
        $user->setId($_SESSION['id']);
        $result = $user->searchNotesUser();
        if (empty($result)){
            $this->defineMessage("error","Não há nenhuma messagem para mostrar");
        }
        require __DIR__.'/../View/notes/notes.php';

    }

}


?>