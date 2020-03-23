<?php


namespace App\Components;


use App\Forms\ResearchFormFactory;
use App\Model\ResearchFacade;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Utils\Json;

class ResearchControl extends Control
{
    /** @var ResearchFormFactory */
    private $formFactory;

    /** @var ResearchFacade */
    private $facade;

    /**
     * ResearchControl constructor.
     * @param ResearchFormFactory $formFactory
     * @param ResearchFacade $facade
     */
    public function __construct(ResearchFormFactory $formFactory, ResearchFacade $facade)
    {
        $this->formFactory = $formFactory;
        $this->facade = $facade;
    }

    public function render(): void
    {
        $this->template->setFile(__DIR__ . '/templates/research_form.latte');
        $this->template->render();
    }

    protected function createComponentResearchForm(): Form
    {
        $form = $this->formFactory->create();

        $form->onSuccess[] = static function (Form $form, ArrayHash $values) {
            //todo
        };

        return $form;
    }

    public function handleAction(): void
    {

        if ($this->presenter->isAjax()) {
//            $this->facade->insert($this->presenter->getHttpRequest()->getPost());
            $data = $this->presenter->getHttpRequest()->getPost();
            $this->presenter->payload->message = 'Success';
            $this->presenter->payload->json = $data;

            $this->template->currentName = $data['name'];
            $this->template->currentTimestamp = $data['timestamp'];
            $this->template->currentValue = $data['value'];
            $this->redrawControl();
            $this->presenter->redrawControl();
        } else {
            $this->presenter->redirect('this');
        }
    }
}