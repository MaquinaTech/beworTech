<?php

namespace Vocces\Company\Application;

use Vocces\Company\Domain\Company;
use Vocces\Company\Domain\ValueObject\CompanyId;
use Vocces\Company\Domain\ValueObject\CompanyName;
use Vocces\Company\Domain\ValueObject\CompanyEmail;
use Vocces\Company\Domain\ValueObject\CompanyAddress;
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
     * @param CompanyRepositoryInterface $repository
     * @return void
     */
    public function __construct(CompanyRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new company
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $address
     * @return Company
     */
    public function handle($id, $name, $email, $address)
    {
        $company = new Company(
            new CompanyId($id),
            new CompanyName($name),
            new CompanyEmail($email),
            new CompanyAddress($address),
            CompanyStatus::disabled()
        );

        $this->repository->create($company);

        return $company;
    }
}
