<?php

namespace Tests\Vocces\Company\Infrastructure;

use Vocces\Company\Domain\Company;

use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryFake implements CompanyRepositoryInterface
{
    private bool $callMethodCreate = false;
    private bool $callMethodActivate = false;
    private array $companies = [];

    /**
     * @inheritdoc
     */
    public function create(Company $company): void
    {
        $this->companies[(string) $company->id()] = $company;
        $this->callMethodCreate = true;
    }

    /**
     * @inheritdoc
     */
    public function activate(Company $company): void
    {
        $company->setStatus(CompanyStatus::enabled());
        $this->callMethodActivate = true;
    }

    /**
     * @inheritDoc
     */
    public function findById(string $id): ?Company
    {
        return $this->companies[$id] ?? null;
    }
}
