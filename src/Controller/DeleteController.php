<?php


namespace Louzada\NotePad\Controller;


use Louzada\NotePad\Helper\TraitFlashMessage;
use Louzada\NotePad\Model\Note;

class DeleteController implements ProcessRequestInterface
{
    use TraitFlashMessage;
    public function ProcessRequest(): void
    {
        $id_note = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
        echo $id_note;

        if (is_null($id_note) || $id_note === false){
            $this->defineMessage("error","Sorry! Note isn't validate");
            header('Location: notes');
            exit();
        }

        try {
            $note = new Note();
            $note->setId($id_note);
            $note->deleteNote();
            $this->defineMessage("success","Note was deleted with success");
        }catch (\Exception $e){
            $this->defineMessage("error","Sorry! Note doesn't exist");
        }

        header('Location: notes');
    }
}