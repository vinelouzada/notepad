<?php
namespace Louzada\NotePad\Controller;

use Louzada\NotePad\Helper\TraitFlashMessage;
use Louzada\NotePad\Model\Note;

class NewNoteController implements ProcessRequestInterface
{
    use TraitFlashMessage;
    public function processRequest():void{
        $title1 = 'New Note';
        $title2 = 'Note<span>Pad</span>';
        $pdo2 = (new Note())->selectAll();

        require __DIR__.'/../View/new-note/new-note.php';



        try {
            if (isset($_POST['title'])){
                $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
                $content = filter_input(INPUT_POST,'content',FILTER_SANITIZE_STRING);

                $note = new Note();
                $note->setTitle($title);
                $note->setContent($content);
                $note->setUserNote($_SESSION['id']);
                $note->createNewNote();
                $this->defineMessage("success","A New Note was created");
                header('Location: /notes');
            }
        }catch (\Exception $e){
            echo $e;
            header('Location: /new-note');
        }
    }
}
