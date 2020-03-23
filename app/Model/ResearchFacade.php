<?php


namespace App\Model;


use Nette\Database\Context;

class ResearchFacade
{
    /** @var Context */
    protected $connection;

    /**
     * ResearchFacade constructor.
     * @param Context $connection
     */
    public function __construct(Context $connection)
    {
        $this->connection = $connection;
    }

    public function insert($data): void
    {
        //todo
    }


}