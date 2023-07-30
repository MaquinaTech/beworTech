<?php

namespace Vocces\Company\Application;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyStatusActivate implements ServiceInterface
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
     * Update company status from inactive to active
     * 
     * @param string $id
     * @return Company|null
     */
    public function handle($id)
    {
        // Activate Company
        $company = $this->repository->activate($id);

        // If the company is null, throw an exception
        if(!isset($company)) {
            throw new \Exception('Company not found');
        }

        // Return the company
        return $company;
    }
}
