<?php

namespace Tests\Vocces\Company\Infrastructure;

use Vocces\Company\Domain\Company;

use Vocces\Company\Domain\ValueObject\CompanyStatus;
use Vocces\Company\Domain\CompanyRepositoryInterface;

class CompanyRepositoryFake implements CompanyRepositoryInterface
{
    // Properties to check if the methods are called
    private bool $callMethodCreate = false;
    private bool $callMethodActivate = false;

    // Array to store the companies
    private array $companies = [];

    /**
     * @inheritdoc
     */
    public function create(Company $company): void
    {
        // Add the company to the array
        $this->companies[(string) $company->id()] = $company;

        // Set flag to true
        $this->callMethodCreate = true;
    }

    /**
     * @inheritdoc
     */
    public function activate(string $id): ?Company
    {
        // Find the company in array
        $company = $this->companies[$id] ?? null;

        
        // If the company is not found, return exception
        if (!isset($this->companies[(string) $id])) {
            throw new \Exception("Company with ID {$id} not found.");
        }

        // Activate the company
        $company->setStatus(CompanyStatus::enabled());

        // Set flag to true
        $this->callMethodActivate = true;

        return $company;
    }

    /**
     * @inheritdoc
     */
    public function list(): ?array
    {
        // If the company list is empty, return exception
        if(empty($this->companies) || !is_array($this->companies)) {
            throw new \Exception("Company list is empty.");
        }

        // Return the company list
        return $this->companies;
    }
}
