<?php

namespace Vocces\Company\Application;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Domain\CompanyRepositoryInterface;
use Vocces\Shared\Domain\Interfaces\ServiceInterface;

class CompanyCreator implements ServiceInterface
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
     * Create a new company
     */
    public function handle($id, $name)
    {
        $company = new Company(
            new CompanyId($id),
            new CompanyName($name),
            CompanyStatus::disabled()
        );

        $this->repository->create($company);

        return $company;
    }
}
