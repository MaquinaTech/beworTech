<?php

namespace Vocces\Company\Application;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyList implements ServiceInterface
{
    /**
     * @var CompanyRepositoryInterface $repository
     */
    private CompanyRepositoryInterface $repository;

    /**
     * Create new instance
     * @param CompanyRepositoryInterface $repository
     * @return void
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get company list
     * 
     * @return array|null
     */
    public function handle() : ?array
    {
        // Get the company list
        $list = $this->repository->list();

        // If the list is empty, return null
        if(empty($list)) {
            return null;
        }

        // Return the company list
        return $list;
    }
}
