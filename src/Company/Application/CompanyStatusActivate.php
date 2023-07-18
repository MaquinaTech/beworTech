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
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Update company status from inactive to active
     */
    public function handle($id)
    {
        // Get company
        $company = $this->repository->findById($id);
        if (!$company) {
            throw new \Exception("Company not found");
        }
        // Activate company
        $company->setStatus(CompanyStatus::enabled());
        $this->repository->activate($company);

        return $company;
    }
}
