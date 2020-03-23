<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\ResearchControl;
use App\Components\ResearchControlFactory;
use App\Forms\ResearchFormFactory;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /** @var ResearchControlFactory @inject */
    public $researchControlFactory;

    public function createComponentResearchFormControl(): ResearchControl
    {
        return $this->researchControlFactory->create();
    }
}
