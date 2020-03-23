<?php


namespace App\Forms;


use Nette\Application\UI\Form;

class ResearchFormFactory
{
    public function create(): Form
    {
        $form = new Form;

        $form->addText('text1', 'Text1');
        $form->addSelect('select1', 'Select1')
            ->setItems(['item1', 'item2']);
        $form->addSubmit('submit', 'Submit');

        return $form;
    }

}